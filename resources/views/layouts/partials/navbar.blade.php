{{-- NAV BAR (Menggunakan background white/light agar elegan) --}}
<nav class="navbar navbar-expand-lg navbar-light-custom sticky-top shadow-sm"> 
    <div class="container-fluid container-lg">
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/mutiara_logo.png') }}" alt="Mutiara Entertainment Logo" style="height: 70px;width:70px;">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav ms-auto fw-medium">
                
                <li class="nav-item">
                    <a class="nav-link text-dark me-3" href="{{ url('/') }}">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-dark me-3" href="{{ url('/price-list') }}">Price List</a>
                </li>
                
                {{-- Dropdown untuk Our Services --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark me-3" href="#" id="navbarServicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Our Services
                    </a>
                    <ul class="dropdown-menu border-primary-rose" aria-labelledby="navbarServicesDropdown">
                        <li><a class="dropdown-item text-primary-rose" href="#">Wedding Organizer</a></li>
                        <li><a class="dropdown-item" href="#">Event Organizer</a></li>
                        <li><a class="dropdown-item" href="#">Birthday Party</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    {{-- Tautan Kontak Diberi Aksen Warna Rose --}}
                    <a class="nav-link fw-bold text-primary-rose" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>