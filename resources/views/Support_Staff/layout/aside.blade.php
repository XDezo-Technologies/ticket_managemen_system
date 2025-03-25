<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 bg-dark vh-100 text-white p-3">
        <h4>📋 Staff Panel</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('support_staff.index') ? 'active' : '' }}" href="{{ route('support_staff.index') }}">🏠 Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('staffTicket.index') ? 'active' : '' }}" href="{{ route('staffTicket.index') }}">🎟️Assigned Tickets</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link text-white {{ request()->routeIs('staff.profile') ? 'active' : '' }}" href="{{ route('staff.profile') }}">👤 Profile</a> --}}
            </li>
        </ul>
    </div>