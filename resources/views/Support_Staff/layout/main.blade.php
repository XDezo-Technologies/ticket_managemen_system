
    @include('Support_Staff.layout.header')


    <!-- Include Navbar -->
    @include('Support_Staff.layout.navbar')

    <div class="container-fluid">
        
         @include('Support_Staff.layout.aside')
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('container')
            </div>
        </div>
    </div>

</body>
</html>
