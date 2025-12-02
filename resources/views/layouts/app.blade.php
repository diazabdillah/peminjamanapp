<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sound Jakarta App')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    @stack('styles')
    <style>
    /* CUSTOM ROSE PALETTE FOR MUTIARA ENTERTAINMENT */
    .bg-primary-rose { background-color: #C37F87 !important; }
    .text-primary-rose { color: #C37F87 !important; }
    .border-primary-rose { border-color: #C37F87 !important; }
    .bg-secondary-pink { background-color: #F4E5E7 !important; }
    
    /* Tombol Aksen */
    .btn-primary-rose { 
        background-color: #C37F87; 
        border-color: #C37F87; 
        color: white;
    }
    .btn-primary-rose:hover {
        background-color: #a86c73;
        border-color: #a86c73;
    }
    
    /* Navbar dan Footer menjadi light/white agar elegan */
    .navbar-light-custom { background-color: #FFFFFF !important; }
     .text-primary-rose { color: #C37F87 !important; } 
    .btn-primary-rose { background-color: #C37F87; border-color: #C37F87; color: white; }
    .btn-primary-rose:hover { background-color: #a86c73; border-color: #a86c73; }
    .border-primary-rose { border-color: #C37F87 !important; }
    .bg-secondary-pink-custom { background-color: #F4E5E7 !important; } 
    
    /* Efek Hover untuk Card */
    .card-hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    /* Carousel controls untuk judul utama agar terlihat di Light BG */
    #headerCarousel .carousel-control-prev-icon,
    #headerCarousel .carousel-control-next-icon {
        filter: invert(1); /* Agar hitam di background terang */
    }
    .grayscale-filter {
        filter: grayscale(100%);
        transition: filter 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }
    .logo-item:hover .grayscale-filter {
        filter: none;
        opacity: 1;
    }
</style>
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- MEMANGGIL NAVBAR --}}
    @include('layouts.partials.navbar') 


            
            {{-- <div class="col-lg-3 d-none d-lg-block">
                @include('layouts.partials.sidebar')
            </div> --}}
{{-- 
            <main class="col-lg-9"> --}}
                @yield('content')
            {{-- </main> --}}

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>