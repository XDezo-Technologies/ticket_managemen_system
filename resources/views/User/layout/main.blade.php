@include('layouts.header')
@include('User.layout.nav')
@include('User.layout.navbar')

<!-- Include Navbar -->


<div class="container-fluid p-4" style="position: absolute; left:15%;">
    
    
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            @yield('container')
        </div>
    </div>
</div>

</body>
</html>