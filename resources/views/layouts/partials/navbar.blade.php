{{-- NAV BAR (Menggunakan background white/light agar elegan) --}}
<nav class="navbar navbar-expand-lg navbar-light-custom sticky-top shadow-sm"> 
    {{-- Menggunakan container-lg agar konten tidak full-width --}}
    <div class="container-fluid container-lg">
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/mutiara_logo.png') }}" alt="Mutiara Entertainment Logo" style="height: 70px;width:70px;">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            {{-- Bagian Kiri Navbar (Navigasi Utama) --}}
            <ul class="navbar-nav me-auto fw-medium">
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
            
            <div class="d-flex align-items-center">
                
                @php
                    // Ambil jumlah item di keranjang. Jika belum di-set, default 0.
                    // Gunakan View Composer di Laravel untuk setting variabel global ini.
                    $currentCartCount = $cartCount ?? 0; 
                @endphp
                
                {{-- 1. Ikon Keranjang (Badge hanya muncul jika $currentCartCount > 0) --}}
                <a href="{{ route('cart.index') }}" class="btn btn-link text-dark position-relative p-0 me-3">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    
                    @if ($currentCartCount > 0)
                    {{-- Tampilkan angka '1' di badge jika keranjang tidak kosong --}}
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger" style="font-size: 0.6em;">
                        1 {{-- Nilai hardcode '1' sesuai permintaan, meskipun $currentCartCount > 0 --}}
                        <span class="visually-hidden">items in cart</span>
                    </span>
                    @endif
                </a>
                
                @auth 
                {{-- 2. Dropdown Profile (Tombol Profile & Logout) --}}
                <div class="dropdown">
                    <button class="btn btn-primary-rose dropdown-toggle btn-sm fw-bold" 
                            type="button" 
                            id="userDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <i class="fas fa-user me-1"></i> {{ Auth::user()->name ?? 'Akun' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-primary-rose shadow-sm" aria-labelledby="userDropdown">
                        
                        {{-- Tautan Profile/Dashboard --}}
                        <li><a class="dropdown-item text-dark" href="{{ url('/dashboard') }}">
                            <i class="fas fa-user-circle me-2 text-primary-rose"></i> Profil Saya
                        </a></li>
                        
                        {{-- Tautan Pesanan/Riwayat --}}
                        <li><a class="dropdown-item text-dark" href="{{ route('orders.index') }}">
                            <i class="fas fa-receipt me-2 text-primary-rose"></i> Pesanan Saya
                        </a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        {{-- Tombol Logout (Menggunakan Form POST) --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                
                @else
                {{-- Jika belum login --}}
                <a href="{{ route('login') }}" class="btn btn-primary-rose btn-sm fw-bold">Login</a>
                @endauth
            </div>
            
        </div>
    </div>
</nav>