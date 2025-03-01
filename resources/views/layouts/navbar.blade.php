<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        
        <!-- Logo -->
        <a class="navbar-brand ms-3" href="/">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" 
                width="100" height="80" class="d-inline-block align-text-top me-2" style="max-height: 70px; object-fit: contain;">
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Create Ticket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Support</a>
                </li>

                <!-- Profile Dropdown -->
                @guest
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white px-3" href="register" id="signup">
                        Sign Up
                    </a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" 
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/35" alt="Profile" class="rounded-circle me-2" width="35" height="35">
                        <span>User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
