@extends('layouts.app')

{{-- Menggunakan Title yang sesuai --}}
@section('title', 'Daftar Harga - Mutiara Entertainment')

@push('styles')
<style>
/* ... (CSS Anda) ... */
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
        
        <div class="col-lg-6 order-lg-1 order-2"> {{-- Diubah ke order 1 agar hero text di kiri di desktop --}}
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

        <div class="col-lg-6 order-lg-2 order-1 text-center"> {{-- Diubah ke order 2 agar gambar di kanan di desktop --}}
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
    {{-- 3. SECTION SEWA SOUND SYSTEM (PAKET PRODUK DARI DB) --}}
    {{-- ========================================================== --}}

<section id="price-list" class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold mb-2 text-dark">Pilih Paket Sound System Terbaik Anda 🔊</h2>
        <p class="lead text-primary-rose">Layanan Audio Visual, Lighting, dan Streaming berkualitas profesional.</p>
    </div>

    <div class="row justify-content-center g-4">
        @foreach ($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-lg border-{{ $product->id == 2 ? 'primary-rose border-4' : 'light' }} card-hover-scale">
                
                {{-- Header Card --}}
                <div class="card-header text-center bg-{{ $product->id == 2 ? 'primary-rose text-white' : 'light' }} p-3">
                    <h4 class="fw-bold mb-1">{{ $product->name }}</h4>
                    <p class="small m-0 {{ $product->id == 2 ? 'text-white-50' : 'text-secondary' }}">{{ $product->tag }}</p>
                </div>

                {{-- Body Card --}}
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="text-center mb-4">
                        <p class="mb-0 small text-secondary">Mulai dari</p>
                        <h2 class="display-5 fw-bolder text-primary-rose">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                    </div>
                    
                   <ul class="list-unstyled mb-4">
    @if ($product->features && is_array($product->features))
        @foreach ($product->features as $feature)
        <li class="mb-2 d-flex align-items-start">
            <i class="fas fa-check-circle me-3 mt-1 text-primary-rose flex-shrink-0"></i>
            <span class="text-dark">{{ $feature }}</span>
        </li>
        @endforeach
    @else
        {{-- Tampilkan pesan default jika fitur kosong atau tidak valid --}}
        <li class="mb-2 d-flex align-items-start text-muted small">
            <i class="fas fa-info-circle me-3 mt-1 flex-shrink-0"></i>
            <span>Rincian fitur belum tersedia.</span>
        </li>
    @endif
</ul>

                    {{-- Footer Card (Tombol Pesan) --}}
                    <div class="mt-auto">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn w-100 fw-bold btn-{{ $product->id == 2 ? 'dark' : 'primary-rose' }} shadow-sm">
                                <i class="fas fa-cart-plus me-1"></i> Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

    {{-- ========================================================== --}}
    {{-- 4. SECTION ITEM TERPISAH (ADD-ONS DARI DB) --}}
    {{-- ========================================================== --}}

<section id="add-ons" class="container py-5 bg-white shadow-sm">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold mb-2 text-dark">Layanan & Perlengkapan Terpisah (Add-Ons) 🛠️</h2>
        <p class="lead text-secondary">Sesuaikan paket Anda dengan layanan tambahan yang dibutuhkan.</p>
    </div>

    <div class="row g-3">
        @foreach ($addons as $addon)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-light card-hover-scale">
                <div class="card-body p-3 d-flex flex-column align-items-center text-center">
                    <i class="fas fa-{{ $addon->icon }} fa-2x text-primary-rose mb-3"></i>
                    <h6 class="fw-bold text-dark mb-1">{{ $addon->name }}</h6>
                    <p class="small text-secondary mb-3">Rp {{ number_format($addon->price, 0, ',', '.') }}</p>
                    
                    <form action="{{ route('cart.store') }}" method="POST" class="mt-auto w-100">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $addon->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-sm btn-outline-primary-rose w-100 fw-bold">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<hr class="container border-primary-rose my-5">


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
                                <p>Kami hanya menyediakan *Sound Man* (teknisi audio) yang ahli, bersertifikat, dan berpengalaman. Kualitas peralatan sebagus apapun akan percuma tanpa operator yang mumpuni. Kami menjamin tim yang mengoperasikan acara Anda adalah yang terbaik di bidangnya.</p>
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
                                <p>Ya, kami melayani berbagai acara di seluruh area **Jabodetabek**. Untuk acara skala besar di luar kota (Jawa Barat dan Jawa Tengah), silakan hubungi tim konsultan kami untuk penawaran khusus.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</div>

@endsection