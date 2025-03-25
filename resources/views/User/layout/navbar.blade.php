<div class="d-flex">
    <div class="bg-dark text-white min-vh-100 p-3" style="width: 250px;">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link text-white">Home</a>
            </li>
           
            
            <li class="nav-item">
                <a class="nav-link text-white dropdown-toggle" href="#" id="fileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="menu-icon tf-icons bx bx-box"></i> Ticket
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="fileDropdown">
                    <li>
                        <a class="dropdown-item text-white" href="{{ route('Ticket.index') }}">index</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-white" href="{{ route('Ticket.create') }}">Create</a>
                    </li>
                </ul>
            </li>
            <!-- Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-white dropdown-toggle" href="#" id="fileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="menu-icon tf-icons bx bx-box"></i> File
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="fileDropdown">
                    <li>
                        <a class="dropdown-item text-white" href="{{ route('file.index') }}">Index</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-white" href="{{ route('file.create') }}">Create</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
            </li>
        </ul>
    </div>

