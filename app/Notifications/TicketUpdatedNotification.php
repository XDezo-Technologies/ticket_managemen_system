<?php

namespace App\Notifications;

use App\Models\Tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketUpdatedNotification extends Notification
{
    use Queueable;
    protected $ticket;
    /**
     * Create a new notification instance.
     */
    public function __construct(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Ticket Status Updated')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('Your ticket status has been updated.')
        ->line('Title: ' . $this->ticket->title)
        ->line('New Status: ' . ucfirst($this->ticket->status))
        ->action('View Ticket', url('/Ticket/' . $this->ticket->id))
        ->line('Thank you for your patience!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
