<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.index') }}">🚀 User Panel</a>

        <!-- Navbar Toggler for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">🏠 Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('Ticket.index') ? 'active' : '' }}" href="{{ route('Ticket.index') }}">🎟️ Tickets</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link {{ request()->routeIs('staff.profile') ? 'active' : '' }}" href="{{ route('staff.profile') }}">👤 Profile</a> --}}
                </li>
            </ul>

            <!-- Right Side: User Dropdown -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }} 🔻
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">⚙️ Settings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">🚪 Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- Dark Mode Toggle -->
                <li class="nav-item">
                    <button class="btn btn-outline-light ms-2" onclick="toggleDarkMode()">🌙</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Dark Mode Script -->
<script>
    function toggleDarkMode() {
        document.body.classList.toggle("bg-dark");
        document.body.classList.toggle("text-white");
    }
</script>
