{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.main')
@section('container')

<div class="py-4">
    <div class="container">
        <div class="card mb-4">
            <div class="card-body" style="background-color: #F1F1F1">
                <section>
                    <header>
                        <h2 class="h5 mb-2">
                            {{ __('Profile Information') }}
                        </h2>
        
                        <p class="text-muted small">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>
                    @if(session('status'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
        
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        @method('patch')
        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __(' Name') }}</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" autofocus autocomplete="name">
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            
                        </div>
        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                                <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $user->phone) }}" autofocus autocomplete="phone">
                                @if($errors->has('phone'))
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" autocomplete="username">
                                @if($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
        
                        <div class="row mb-3">
                           
                            <div class="col-md-6">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <input id="address" name="address" type="text" class="form-control" value="{{ old('address', $user->address) }}" autofocus autocomplete="address">
                                @if($errors->has('address'))
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">{{ __('Profile Image') }}</label>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <a target="_blank" href="{{ asset('uploads/' . $user->profile_picture) }}">
                                        <img src="{{ asset('uploads/' . $user->profile_picture) }}" class="mt-3 rounded-circle" alt="" width="100px" height="100px">
                                    </a>
                                </div>
                                <div>
                                    <input id="profile_picture" name="profile_picture" type="file" class="form-control" accept="image/*">
                                    @if($errors->has('profile_picture'))
                                        <p class="text-danger">{{ $errors->first('profile_picture') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
        
                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-warning btn-sm text-uppercase d-inline-flex align-items-center justify-content-center px-4 py-2 btn-gradient" >{{ __('Save') }}</button>
        
                            @if (session('status') === 'profile-updated')
                                <p class="text-muted small mb-0">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
        

        <div class="card mb-4">
            <div class="card-body"  style="background-color: #F1F1F1">
                <section>
                    <header>
                        <h2 class="h5 mb-2">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="text-muted small">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>
                    @if(session('status'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('password.update') }}" class="mt-3">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password')" />
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-warning btn-sm  text-uppercase d-inline-flex align-items-center justify-content-center px-4 py-2 btn-gradient" >{{ __('Save') }}</button>

                            @if (session('status') === 'password-updated')
                                <p class="text-muted small mb-0">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <div class="card">
            <div class="card-body"  style="background-color: #F1F1F1">
                <section>
                    <header>
                        <h2 class="h5 mb-2">
                            {{ __('Delete Account') }}
                        </h2>

                        <p class="text-muted small">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                        {{ __('Delete Account') }}
                    </button>

                    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    @method('delete')

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Confirm Account Deletion') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" name="password" type="password" class="form-control">
                                            <x-input-error :messages="$errors->userDeletion->get('password')" />
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection


