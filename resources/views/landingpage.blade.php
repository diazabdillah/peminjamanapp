@extends('layouts.app')

{{-- Menggunakan Title yang sesuai --}}
@section('title', 'Daftar Harga - Mutiara Entertainment')

@push('styles')
<style>
    /* Menambahkan beberapa class kustom untuk meningkatkan tampilan */
    .bg-secondary-pink-custom {
        background-color: #eb0853ff; /* Light Pink - Warna yang lembut */
    }
    .text-primary-rose {
        color: #e91e63 !important; /* Rose - Warna yang kuat untuk branding */
    }
    .btn-primary-rose {
        background-color: #e91e63;
        border-color: #e91e63;
        color: #fff;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-primary-rose:hover {
        background-color: #c2185b;
        border-color: #c2185b;
        transform: translateY(-2px); /* Efek hover ringan */
    }
    .card-hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    .hero-image-container {
        clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);
        /* Efek clipping untuk tampilan lebih unik di desktop */
    }
    @media (max-width: 991.98px) {
        .hero-image-container {
            clip-path: none;
            /* Nonaktifkan clipping di perangkat mobile */
        }
    }
    /* Filter Grayscale untuk mitra */
    .grayscale-filter {
        filter: grayscale(100%);
        opacity: 0.7;
    }
    .transition-filter {
        transition: filter 0.3s ease, opacity 0.3s ease;
    }
    .logo-item:hover .grayscale-filter {
        filter: grayscale(0%);
        opacity: 1;
    }
    /* Efek untuk Galeri */
    .gallery-item {
        overflow: hidden;
        border-radius: 8px;
        position: relative;
    }
    .gallery-item img {
        transition: transform 0.5s ease;
    }
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(233, 30, 99, 0.7); /* Primary Rose Semi-transparan */
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        text-align: center;
        padding: 20px;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    /* Custom style untuk kontrol carousel yang lebih terlihat */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(233, 30, 99, 0.7); /* Warna Primary Rose */
        padding: 20px;
        border-radius: 50%;
        opacity: 1; /* Pastikan selalu terlihat */
    }
    .carousel-control-prev, .carousel-control-next {
        opacity: 0.8;
    }
    .carousel-control-prev:hover, .carousel-control-next:hover {
        opacity: 1;
    }
</style>
@endpush

@section('content')

{{-- KONTEN UTAMA DENGAN BACKGROUND LIGHT PINK --}}
<div class="bg-secondary-pink-custom pb-5 text-dark">
    
    {{-- ========================================================== --}}
    {{-- 1. HERO SECTION (GAMBAR DI KANAN, FULL-WIDTH) --}}
    {{-- ========================================================== --}}
   <div class="container-fluid p-0">
    <div class="row align-items-stretch g-0"> {{-- Menggunakan align-items-stretch untuk memastikan kolom mengisi tinggi penuh --}}
        
        <div class="col-lg-6 order-lg-2 order-1">
            {{-- h-100 memastikan card ini mengisi tinggi kolom secara penuh --}}
            <div class="card p-4 p-md-5 bg-white d-flex flex-column justify-content-center rounded-0 border-0">
                <p class="small fw-bold text-primary-rose text-uppercase mb-2">Mutiara Entertainment</p>
                <h1 class="display-4 fw-bold mb-4">
                    Jadikan Acara Anda <span class="text-primary-rose">Elegan dan Tak Terlupakan</span>
                </h1>
                <p class="lead text-secondary mb-4">
                    Kami adalah spesialis **Wedding Planner** dan **Event Organizer** yang berfokus pada detail, kualitas, dan kesempurnaan momen spesial Anda.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <a href="#portfolio" class="btn btn-lg btn-primary-rose shadow-lg">Lihat Portfolio</a>
                    <a href="{{ url('/contact') }}" class="btn btn-lg btn-outline-secondary shadow-sm">Hubungi Konsultan</a>
                </div>
            </div> 
        </div>

        <div class="col-lg-6 order-lg-2 order-1 text-center">
            {{-- Menghilangkan hero-image-container dan menggunakan h-100 agar carousel mengisi kolom --}}
            <div id="heroCarousel" class="carousel bg-white slide h-100" data-bs-ride="carousel"> 
                
                {{-- Indikator Carousel --}}
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                {{-- Item Carousel (Gambar) --}}
                <div class="carousel-inner h-100"> {{-- Pastikan carousel-inner juga h-100 --}}
                    
                    {{-- Slide 1: Elegant Wedding (Active) --}}
                    <div class="carousel-item active h-100">
                        <img src="https://via.placeholder.com/800x600?text=Elegant+Wedding+Planner+1" 
                            class="d-block w-100 h-100" {{-- d-block w-100 h-100 --}}
                            alt="Elegant Wedding Planning" 
                            style="object-fit: cover;"> {{-- min-height 400px dihilangkan --}}
                        <div class="carousel-caption d-none d-md-block bg-primary-rose bg-opacity-50 rounded p-2">
                            <h5 class="fw-bold">Dekorasi Pilihan Terbaik</h5>
                            <p class="small">Sentuhan mewah untuk hari spesial Anda.</p>
                        </div>
                    </div>
                    
                    {{-- Slide 2: Corporate Event --}}
                    <div class="carousel-item h-100">
                        <img src="https://via.placeholder.com/800x600?text=Corporate+Event+Sound+System+2" 
                            class="d-block w-100 h-100"
                            alt="Corporate Event Sound System" 
                            style="object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block bg-primary-rose bg-opacity-50 rounded p-2">
                            <h5 class="fw-bold">Sound System Profesional</h5>
                            <p class="small">Kualitas audio jernih untuk acara korporat.</p>
                        </div>
                    </div>
                    
                    {{-- Slide 3: Live Streaming Setup --}}
                    <div class="carousel-item h-100">
                        <img src="https://via.placeholder.com/800x600?text=Live+Streaming+Production+3" 
                            class="d-block w-100 h-100"
                            alt="Live Streaming Production" 
                            style="object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block bg-primary-rose bg-opacity-50 rounded p-2">
                            <h5 class="fw-bold">Layanan Live Streaming HD</h5>
                            <p class="small">Jangkau audiens lebih luas tanpa batas.</p>
                        </div>
                    </div>

                </div>

                {{-- Kontrol (Prev/Next) --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
    {{-- ========================================================== --}}
    {{-- 2. SECTION TESTIMONI (CAROUSEL) --}}
    {{-- ========================================================== --}}
 <section class="container-fluid bg-white py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-2 text-primary-rose">Spesialis Corporate Event!</h2>
            <h3 class="fw-bold text-dark">Kamu Juga Berhak Mendapatkan Pelayanan Yang Sama!</h3>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        {{-- SLIDE 1: Testimoni Reza --}}
                        <div class="carousel-item active">
                            <div class="card border-3 border-primary-rose bg-white shadow-lg card-hover-scale">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50x50?text=R" class="rounded-circle me-3 border border-2 border-secondary" alt="Reza" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div><h5 class="fw-bold text-dark mb-0">Reza</h5><p class="small text-primary-rose m-0">Event Organizer</p></div>
                                        <a href="#" class="ms-auto text-primary-rose"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                    <p class="text-dark fw-semibold mb-1 fst-italic">"Nggak ada lawan bro.."</p>
                                    <p class="small text-secondary">The best vendor sound system selama gw jadi EO. Timnya asik-asik, nggak pada kaku, berasa bermitra sama temen. Sukses buat lo semua bro.</p>
                                </div>
                            </div>
                        </div>

                        {{-- SLIDE 2: Testimoni Nana --}}
                        <div class="carousel-item">
                            <div class="card border-3 border-primary-rose bg-white shadow-lg card-hover-scale">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50x50?text=N" class="rounded-circle me-3 border border-2 border-secondary" alt="Nana" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div><h5 class="fw-bold text-dark mb-0">Nana</h5><p class="small text-primary-rose m-0">Make up Artist</p></div>
                                        <a href="#" class="ms-auto text-primary-rose"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                    <p class="text-dark fw-semibold mb-1 fst-italic">"KECEWA GW!"</p>
                                    <p class="small text-secondary">Kecewa dulu pernah pake vendor laen haha. Tau gitu dari dulu aja pake soundjakarta. Band ok banget, sound ga perlu ditanya lah. Dan yang paling penting buat gw sih, komunikasi mereka sangat baik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Kontrol Carousel yang lebih menonjol --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        {{-- Kontrol carousel di atas background putih sebaiknya berwarna gelap atau primary-rose agar terlihat --}}
                        <span class="carousel-control-prev-icon bg-primary-rose rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-primary-rose rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
 
    
    {{-- ========================================================== --}}
    {{-- 3. SECTION SEWA SOUND SYSTEM (STANDARD) --}}
    {{-- ========================================================== --}}
<section class="container py-5">
    @php $soundSystemTitle = $product1->firstWhere('category_id', 5)->nama_kategori ?? 'Sewa Sound System Standard'; @endphp
    
    <h2 class="text-center text-dark fw-bold mb-5">{{ $soundSystemTitle }}</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
        @foreach ($product1 as $package)
        @if($package->category_id == 5)
        <div class="col">
            <div class="card bg-white h-100 border border-primary-rose shadow-lg card-hover-scale">
                <img src="https://via.placeholder.com/400x200?text=Sound+{{ $package->image }}" class="card-img-top" alt="Sound System">
                <div class="card-body text-center p-4 d-flex flex-column">
                    <h4 class="card-title text-primary-rose fw-bold">{{ $package->name }}</h4>
                    <p class="card-text text-secondary mb-3 small">{{ $package->description }}</p>
                    <h5 class="fw-bolder text-dark mt-auto mb-3">Harga: Rp {{ number_format($package->price, 0, ',', '.') }}</h5>
                    
                    <div class="d-grid gap-2 d-sm-flex justify-content-center">
                        
                        {{-- PERBAIKAN KRITIS PADA FORM INPUT PRODUCT_ID --}}
                        <form action="{{ route('cart.store') }}" method="POST" class="d-inline flex-fill">
                            @csrf
                            {{-- PASTIKAN VALUE ID DITARIK DARI ELOQUENT OBJECT --}}
                            <input type="hidden" name="product_id" value="{{ $package->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-sm btn-primary-rose w-100">
                                <i class="fas fa-shopping-cart me-1"></i> Add to Chart
                            </button>
                        </form>
                        
                        <a href="{{ url('/checkout/direct/' . $package->id) }}" class="btn btn-sm btn-outline-secondary flex-fill d-flex align-items-center justify-content-center">
                            <i class="fas fa-bolt me-1"></i> Pesan Langsung
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
    

    {{-- 4. SECTION SOUND SYSTEM LINE ARRAY --}}
<section class="container py-5">
    @php $lineArrayTitle = $product1->firstWhere('category_id', 1)->nama_kategori ?? 'Sound System Line Array'; @endphp
    
    <h2 class="text-center text-dark fw-bold mb-5">{{ $lineArrayTitle }}</h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @foreach ($product1 as $package)
        @if($package->category_id == 1)
        <div class="col">
            <div class="card bg-white h-100 border border-primary-rose shadow-lg card-hover-scale">
                <img src="https://via.placeholder.com/400x200?text=Line+Array" class="card-img-top" alt="Line Array">
                <div class="card-body text-center p-4 d-flex flex-column">
                    <h4 class="card-title text-primary-rose fw-bold">{{ $package->name }}</h4>
                    <p class="card-text text-secondary mb-3 small">{{ $package->description }}</p>
                    <h5 class="fw-bolder text-dark mt-auto mb-3">Harga Mulai: Rp {{ number_format($package->price, 0, ',', '.') }}</h5>
                    
                    {{-- DUAL CTA BUTTONS FIX --}}
                    <div class="d-grid gap-2 d-sm-flex justify-content-center">
                        {{-- 1. FORM UNTUK ADD TO CART (CHART) --}}
                        <form action="{{ route('cart.store') }}" method="POST" class="d-inline flex-fill">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $package->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-sm btn-primary-rose w-100">
                                <i class="fas fa-shopping-cart me-1"></i> Add to Chart
                            </button>
                        </form>
                        {{-- 2. PESAN LANGSUNG (Link ke Checkout) --}}
                        <a href="{{ url('/checkout/direct/' . $package->id) }}" class="btn btn-sm btn-outline-secondary flex-fill d-flex align-items-center justify-content-center">
                            <i class="fas fa-bolt me-1"></i> Pesan Langsung
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>



    {{-- 6. SECTION LIVE STREAMING --}}
    
    
    
    <section class="container py-5">
        @php $liveStreamTitle = $product1->firstWhere('category_id', 3)->nama_kategori ?? 'Live Streaming'; @endphp
        
        <h2 class="text-center text-dark fw-bold mb-5">{{ $liveStreamTitle }}</h2>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2">
            @foreach ($product1 as $package)
            @if($package->category_id == 3)
            <div class="col">
                <div class="card bg-white h-100 border border-primary-rose shadow-lg text-center card-hover-scale">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="text-primary-rose fw-bold">{{ $package->name }}</h5>
                        <h4 class="fw-bolder text-dark mt-4">Rp {{ number_format($package->price, 0, ',', '.') }},-</h4>
                        <hr>
                        <ul class="list-unstyled small text-secondary mx-auto flex-grow-1" style="max-width: 250px;">
                             <li><i class="fas fa-check-circle me-1 text-primary-rose"></i> {{ $package->description }}</li>
                        </ul>
                        
                        {{-- DUAL CTA BUTTONS FIX --}}
                        <div class="d-grid gap-2 d-sm-flex justify-content-center mt-auto">
                            <button class="btn btn-sm btn-primary-rose flex-fill">
                                <i class="fas fa-shopping-cart me-1"></i> Add to Chart
                            </button>
                            <button class="btn btn-sm btn-outline-secondary flex-fill">
                                <i class="fas fa-bolt me-1"></i> Pesan Langsung
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        
        {{-- Cara Kerja Live Streaming --}}
        {{-- <h4 class="text-center text-dark fw-bold mt-5 mb-4">Cara Kerja Live Streaming Kami</h4>
        <div class="text-center">
            <img src="https://via.placeholder.com/900x300?text=Live+Streaming+Workflow+Diagram" class="img-fluid rounded-lg shadow-lg" alt="Workflow Diagram">
            <p class="small text-secondary mt-3">Output siaran dapat disiarkan ke berbagai platform seperti YouTube, Zoom, atau platform kustom.</p>
        </div> --}}
    </section>


    


    {{-- ========================================================== --}}
    {{-- 6. SECTION GALERI PORTOFOLIO KEGIATAN BARU --}}
    {{-- ========================================================== --}}
    <section id="portfolio" class="bg-primary-rose py-5">
    <div class="container">
        <div class="text-center mb-5">
            {{-- Mengubah teks menjadi putih agar kontras dengan bg-primary-rose --}}
            <h2 class="display-6 fw-bold mb-2 text-white">Momen Tak Terlupakan Kami 📸</h2>
            <p class="lead text-light">Lihatlah beberapa kegiatan yang telah kami tangani dengan sukses.</p>
        </div>
        
        @php
            $activities = [
                ['title' => 'Elegant Wedding', 'desc' => 'Dekorasi dan tata suara pernikahan mewah.'],
                ['title' => 'Corporate Gathering', 'desc' => 'Event perusahaan skala besar dengan Line Array.'],
                ['title' => 'Live Concert', 'desc' => 'Sound system dan panggung untuk pertunjukan musik.'],
                ['title' => 'Hybrid Seminar', 'desc' => 'Acara seminar dengan dukungan Live Streaming HD.'],
            ];
        @endphp

        <div class="row g-3 g-md-4 justify-content-center">
            @foreach ($activities as $activity)
            <div class="col-sm-6 col-lg-3">
                {{-- Membiarkan card sebagai gallery-item yang akan di-overlay --}}
                <div class="gallery-item shadow-lg border border-3 border-white rounded-3"> 
                    <img src="https://via.placeholder.com/600x400?text={{ urlencode($activity['title']) }}" 
                         class="img-fluid w-100" 
                         alt="{{ $activity['title'] }}" 
                         style="height: 250px; object-fit: cover;">
                    <div class="gallery-overlay">
                        <div>
                            <h4 class="fw-bold text-white mb-2">{{ $activity['title'] }}</h4>
                            <p class="small text-light">{{ $activity['desc'] }}</p>
                            {{-- Mengubah tombol menjadi dark (hitam) agar kontras menonjol di atas overlay rose --}}
                            <a href="#" class="btn btn-sm btn-dark mt-2 shadow-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            {{-- Mengubah tombol di bagian bawah menjadi putih agar kontras dengan bg-primary-rose --}}
            <a href="#" class="btn btn-lg btn-outline-light border-3 fw-bold">Lihat Semua Galeri</a>
        </div>
    </div>
</section>



    {{-- 7. MITRA KERJASAMA (Penomoran disesuaikan) --}}
    <section id="partners" class="py-5 py-md-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark mb-2">Mitra Kerjasama Kami</h2>
                <p class="lead text-secondary">Dipercaya oleh berbagai brand dan event organizer terkemuka.</p>
            </div>
            
            <div class="row align-items-center justify-content-center g-4 g-md-5">
                @php $partners = ['Mitra A', 'Mitra B', 'Mitra C', 'Mitra D', 'Mitra E', 'Mitra F']; @endphp

                @foreach ($partners as $partner)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="d-flex flex-column align-items-center logo-item text-center">
                        <div class="rounded-circle border border-3 border-primary-rose p-3 bg-light d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 120px; height: 120px; overflow: hidden;">
                            <img src="https://via.placeholder.com/150x80?text={{ urlencode($partner) }}" alt="{{ $partner }}" 
                                class="img-fluid opacity-50 grayscale-filter transition-filter" 
                                style="max-height: 50px; max-width: 90px; object-fit: contain;">
                        </div>
                        <h6 class="mt-3 small fw-bold text-dark">{{ $partner }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. SECTION TIM ORGANISASI (Penomoran disesuaikan) --}}
    <section id="our-team" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-2 text-dark">Meet Our Amazing Team 🤝</h2>
            <p class="lead text-primary-rose">Profesional di Balik Setiap Acara Sukses Anda.</p>
        </div>
        
        <div class="row justify-content-center g-4">
            @php
                $team = [
                    ['name' => 'Michael Santoso', 'role' => 'Founder & CEO', 'img' => 'Michael'],
                    ['name' => 'Rina Wijaya', 'role' => 'Head of Planning', 'img' => 'Rina'],
                    ['name' => 'Faisal Ali', 'role' => 'Lead Technician', 'img' => 'Faisal'],
                    ['name' => 'Clara Lee', 'role' => 'Client Relations', 'img' => 'Clara'],
                ];
            @endphp

            @foreach ($team as $member)
            <div class="col-6 col-md-3">
                <div class="card bg-white h-100 border-0 shadow-lg text-center card-hover-scale">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="https://via.placeholder.com/150x150?text={{ $member['img'] }}" 
                                class="rounded-circle border border-3 border-primary-rose shadow" 
                                alt="{{ $member['name'] }}" 
                                style="width: 120px; height: 120px; object-fit: cover;">
                        </div>

                        <h5 class="fw-bold text-dark mb-1">{{ $member['name'] }}</h5>
                        <p class="small text-primary-rose">{{ $member['role'] }}</p>
                        <p class="small text-secondary mt-3 mb-0">
                            Fokus pada detail dan kepuasan klien adalah prioritas utama kami.
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    <hr class="container border-primary-rose my-5">
    
    {{-- CTA AKHIR --}}
    <section class="bg-primary-rose text-white mt-5 py-5 text-center">
        <h3 class="fw-bold mb-3">Selangkah Lagi untuk Bikin Event Kamu KEREN! 🎉</h3>
        <p class="lead mb-4">Dapatkan konsultasi gratis dan penawaran terbaik untuk acara Anda.</p>
        <a href="{{ url('/contact') }}" class="btn btn-lg bg-dark text-white shadow-lg">Konsultasi Gratis Sekarang</a>
    </section>
<section id="contact" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-dark mb-2">Hubungi Kami & Pusat Bantuan 📞</h2>
            <p class="lead text-primary-rose">Kami siap melayani konsultasi dan menampung masukan Anda.</p>
        </div>

        <div class="row g-4">
            
            {{-- KOLOM KIRI: MAP & ALAMAT --}}
            <div class="col-lg-6">
                <div class="p-4 bg-white shadow-lg h-100 border border-3 border-primary-rose">
                    <h4 class="fw-bold text-dark mb-3">Lokasi Kantor Pusat</h4>
                    
                    {{-- Embed Google Map --}}
                    <div class="ratio ratio-4x3 mb-4">
                        {{-- Ganti dengan kode embed map Google Maps Anda yang sebenarnya --}}
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4578583482596!2d106.828888!3d-6.195000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f417e80556e5%3A0x7d018d96b0143a5!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1677894567890!5m2!1sid!2sid" 
                            width="600" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi Kantor Mutiara Entertainment">
                        </iframe>
                    </div>

                    <h5 class="fw-bold text-primary-rose">Informasi Kontak</h5>
                    <ul class="list-unstyled small text-secondary">
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-map-marker-alt me-3 mt-1 text-primary-rose flex-shrink-0"></i> 
                            <span>Jl. Kebahagiaan Utama No. 10, <br>Jakarta Pusat, DKI Jakarta, 10110, Indonesia</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone me-3 text-primary-rose flex-shrink-0"></i> 
                            <span>+62 812-XXXX-XXXX (Hotline Service)</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="fas fa-envelope me-3 text-primary-rose flex-shrink-0"></i> 
                            <span>consultant@mutiaraent.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- KOLOM KANAN: FORM ADUAN --}}
            <div class="col-lg-6">
                <div class="p-4 bg-white shadow-lg h-100 border border-3 border-primary-rose">
                    <h4 class="fw-bold text-dark mb-3">Formulir Pengaduan / Konsultasi</h4>
                    <p class="small text-secondary mb-4">Mohon isi formulir di bawah ini dengan detail. Tim kami akan merespon dalam 1x24 jam kerja.</p>
                    
                    <form action="#" method="POST">
                        @csrf {{-- Laravel CSRF Token --}}
                        
                        <div class="mb-3">
                            <label for="name" class="form-label small fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Contoh: Budi Santoso">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label small fw-bold">Subjek (Pilih salah satu)</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="" disabled selected>Pilih Subjek</option>
                                <option value="Konsultasi Event">Konsultasi Event Baru</option>
                                <option value="Pengaduan Layanan">Pengaduan/Keluhan Layanan</option>
                                <option value="Kerjasama Bisnis">Kerjasama Bisnis</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label small fw-bold">Pesan / Detail Kebutuhan Anda</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Jelaskan kebutuhan atau pengaduan Anda..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-primary-rose w-100 mt-3 rounded-0">Kirim Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- FAQ SECTION --}}
    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-dark mb-2">Pertanyaan yang Sering Diajukan (FAQ) 💡</h2>
            <p class="lead text-primary-rose">Temukan jawaban atas pertanyaan umum seputar layanan kami.</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    
                    {{-- Item 1: Q: Kualitas Sound System --}}
                    <div class="accordion-item shadow-sm border border-3 border-primary-rose my-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary-rose text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFAQOne" aria-expanded="true" aria-controls="collapseFAQOne">
                                1. Apakah sound system Anda terjamin kualitasnya?
                            </button>
                        </h2>
                        <div id="collapseFAQOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body bg-white text-secondary">
                                <p>Kami hanya menggunakan sound system dari **BRAND TERBAIK** seperti **Yamaha & JBL**. Kami menjamin hasil output audio yang jernih, bebas pecah, dan stabil di berbagai volume. Kami tidak menggunakan *speaker custom* atau non-branded.</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Item 2: Q: Sound Man Terbaik --}}
                    <div class="accordion-item shadow-sm border border-3 border-primary-rose my-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-primary-rose text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFAQTwo" aria-expanded="false" aria-controls="collapseFAQTwo">
                                2. Siapa yang akan mengoperasikan peralatan di hari H?
                            </button>
                        </h2>
                        <div id="collapseFAQTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body bg-white text-secondary">
                                Kami hanya menyediakan *Sound Man* (teknisi audio) yang ahli, bersertifikat, dan berpengalaman. Kualitas peralatan sebagus apapun akan percuma tanpa operator yang mumpuni. Kami menjamin tim yang mengoperasikan acara Anda adalah yang terbaik di bidangnya.
                            </div>
                        </div>
                    </div>

                    {{-- Item 3: Q: Coverage Area --}}
                    <div class="accordion-item shadow-sm border border-3 border-primary-rose my-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-primary-rose text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFAQThree" aria-expanded="false" aria-controls="collapseFAQThree">
                                3. Apakah layanan Mutiara Entertainment tersedia di luar Jakarta?
                            </button>
                        </h2>
                        <div id="collapseFAQThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body bg-white text-secondary">
                                Ya, kami melayani berbagai acara di seluruh area **Jabodetabek**. Untuk acara skala besar di luar kota (Jawa Barat dan Jawa Tengah), silakan hubungi tim konsultan kami untuk penawaran khusus.
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</div>

@endsection