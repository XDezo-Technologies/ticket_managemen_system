<!-- Navbar for Mobile View -->
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            ☰ Menu
        </button>
    </div>
</nav>

<!-- Sidebar (Offcanvas for Mobile) -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title  text-center">Dashboard</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link text-white">Home</a>
            </li>

            <!-- Ticket Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="ticketDropdown" role="button" data-bs-toggle="dropdown">
                    <i class="menu-icon tf-icons bx bx-box"></i> Ticket
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ticketDropdown">
                    <li><a class="dropdown-item" href="{{ route('Ticket.index') }}">Index</a></li>
                    <li><a class="dropdown-item" href="{{ route('Ticket.create') }}">Create</a></li>
                </ul>
            </li>

            <!-- File Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="fileDropdown" role="button" data-bs-toggle="dropdown">
                    <i class="menu-icon tf-icons bx bx-box"></i> File
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="fileDropdown">
                    <li><a class="dropdown-item" href="{{ route('file.index') }}">Index</a></li>
                    <li><a class="dropdown-item" href="{{ route('file.create') }}">Create</a></li>
                </ul>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
            </li> --}}
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="d-flex">
    <!-- Sidebar (Always Visible on Large Screens) -->
    <div class="bg-dark text-white min-vh-100 p-3 d-none d-md-block" style="width: 200px; position: fixed;">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link text-white">Home</a>
            </li>

            <!-- Ticket Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="ticketDropdown2" role="button" data-bs-toggle="dropdown">
                    <i class="menu-icon tf-icons bx bx-box"></i> Ticket
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ticketDropdown2">
                    <li><a class="dropdown-item" href="{{ route('Ticket.index') }}">Index</a></li>
                    <li><a class="dropdown-item" href="{{ route('Ticket.create') }}">Create</a></li>
                </ul>
            </li>

            <!-- File Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="fileDropdown2" role="button" data-bs-toggle="dropdown">
                    <i class="menu-icon tf-icons bx bx-box"></i> File
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="fileDropdown2">
                    <li><a class="dropdown-item" href="{{ route('file.index') }}">Index</a></li>
                    <li><a class="dropdown-item" href="{{ route('file.create') }}">Create</a></li>
                </ul>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
            </li> --}}
        </ul>
    </div>
