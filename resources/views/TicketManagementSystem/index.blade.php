@extends('layouts.main')
@section('container')
   <div class="container">
      @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ Session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
      
      
  {{-- <div class="image-slider">
    
    <button class="prev" onclick="prevSlide()">&#10094;</button>
    <img src="{{ asset('assets/images/f1.jpeg') }}" id="slide">
    <div class="text-overlay" id="text-image">Device Compatibility Problems</div>
    
</div> --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{asset('assets/images/f2.jpeg')}}" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title</h5>
                    <p class="card-text">This is a simple Bootstrap card with an image, title, and description.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="{{asset('assets/images/f3.jpeg')}}" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Technical issue</h5>
                    <p class="card-text">This is a simple Bootstrap card with an image, title, and description.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="{{asset('assets/images/f4.jpeg')}}" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title</h5>
                    <p class="card-text">This is a simple Bootstrap card with an image, title, and description.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script>
    var img = [
        "{{ asset('assets/images/f2.jpeg') }}",
        "{{ asset('assets/images/f3.jpeg') }}",
        "{{ asset('assets/images/f4.jpeg') }}",
        "{{ asset('assets/images/f5.jpeg') }}",
        // "{{ asset('assets/img/scarf_carousel.jpg') }}",
        // "{{ asset('assets/img/pexels-clothing.jpg') }}"
    ];
    // var text = [
    //     "Slow Internet Speed and High Latency",
    // "Frequent WiFi Disconnections",
    // "Router Connectivity Issues",
    // "Limited Coverage and Weak Signal Strength",
    // "DNS Resolution Failures",
    // "Unauthorized Network Access or Security Breaches",
    // "ISP Outages and Downtime",
    // "Inconsistent Bandwidth Allocation",
    
    // "High Ping Affecting Online Gaming and Streaming"
    // ];
    var colors = [
        "White",
        "White",
        "white",
        "white",
        "white",
        "white"
    ];

    var currentIndex = 0;
    var slideElement = document.getElementById('slide');
    var textElement = document.getElementById('text-image');

    function showSlide(index) {
        if (index < 0) {
            currentIndex = img.length - 1;
        } else if (index >= img.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }

        slideElement.src = img[currentIndex];
        textElement.innerText = text[currentIndex];
        textElement.style.color = colors[currentIndex];
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    setInterval(nextSlide, 3000);
</script> 
@endsection