@extends('layouts.app')

{{-- Menggunakan Title yang sesuai --}}
@section('title', 'Daftar Harga - Mutiara Entertainment')


@section('content')

{{-- KONTEN UTAMA DENGAN BACKGROUND LIGHT PINK --}}
<div class="bg-secondary-pink-custom pb-5 text-dark">
    
    {{-- ========================================================== --}}
    {{-- 1. HERO SECTION (GAMBAR DI KANAN, FULL-WIDTH) --}}
    {{-- ========================================================== --}}

        <div class="row align-items-center g-5 m-0 p-0"> 
            
            <div class="col-lg-6 order-lg-1 order-2 ps-4 ps-md-5">
                <div class="card p-4 p-md-5 border-0 shadow-lg bg-white h-100 d-flex flex-column justify-content-center">
                    
                    <p class="small fw-bold text-primary-rose text-uppercase mb-2">Mutiara Entertainment</p>
                    <h1 class="display-4 fw-bold mb-4">
                        Jadikan Acara Anda <span class="text-primary-rose">Elegan dan Tak Terlupakan</span>
                    </h1>
                    <p class="lead text-secondary mb-4">
                        Kami adalah spesialis Wedding Planner dan Event Organizer yang berfokus pada detail, kualitas, dan kesempurnaan momen spesial Anda.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <a href="#partners" class="btn btn-lg btn-primary-rose shadow-sm">Lihat Portfolio</a>
                        <a href="{{ url('/contact') }}" class="btn btn-lg btn-outline-secondary">Hubungi Konsultan</a>
                    </div>
                </div> 
            </div>

            <div class="col-lg-6 order-lg-2 order-1 text-center pe-0">
                <div class="shadow-lg rounded-3 overflow-hidden border border-3 border-primary-rose me-4 me-lg-0"> 
                    <img src="https://via.placeholder.com/800x600?text=Elegant+Wedding+Planner" 
                         class="img-fluid w-100" 
                         alt="Elegant Event Planning">
                </div>
            </div>
        </div>

    
    
    {{-- ========================================================== --}}
    {{-- 2. SECTION TESTIMONI (CAROUSEL) --}}
    {{-- ========================================================== --}}
    <section class="container py-5">
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
                            <div class="card border border-primary-rose bg-white shadow-lg">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50x50?text=R" class="rounded-circle me-3" alt="Reza" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div><h5 class="fw-bold text-dark mb-0">Reza</h5><p class="small text-secondary m-0">Event Organizer</p></div>
                                        <a href="#" class="ms-auto text-secondary"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <p class="text-dark fw-semibold mb-1">Nggak ada lawan bro..</p>
                                    <p class="small text-secondary">The best vendor sound system selama gw jadi EO. Timnya asik-asik, nggak pada kaku, berasa bermitra sama temen. Sukses buat lo semua bro.</p>
                                </div>
                            </div>
                        </div>

                        {{-- SLIDE 2: Testimoni Nana --}}
                        <div class="carousel-item">
                            <div class="card border border-primary-rose bg-white shadow-lg">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://via.placeholder.com/50x50?text=N" class="rounded-circle me-3" alt="Nana" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div><h5 class="fw-bold text-dark mb-0">Nana</h5><p class="small text-secondary m-0">Make up Artist</p></div>
                                        <a href="#" class="ms-auto text-secondary"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <p class="text-dark fw-semibold mb-1">KECEWA GW!</p>
                                    <p class="small text-secondary">Kecewa dulu pernah pake vendor laen haha. Tau gitu dari dulu aja pake soundjakarta. Band ok banget, sound ga perlu ditanya lah. Dan yang paling penting buat gw sih, komunikasi mereka sangat baik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next"><span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                </div>
            </div>
        </div>
    </section>
    
    {{-- ========================================================== --}}
    {{-- 3. SECTION SEWA SOUND SYSTEM --}}
    {{-- ========================================================== --}}
    <section class="container py-5">
        @php $soundSystemTitle = $product1->firstWhere('category_id', 5)->nama_kategori ?? 'Sewa Sound System'; @endphp
        
        <h2 class="text-center text-dark fw-bold mb-5">{{ $soundSystemTitle }}</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
            @foreach ($product1 as $package)
            @if($package->category_id == 5)
            <div class="col">
                <div class="card bg-white h-100 border border-primary-rose shadow-lg card-hover-scale">
                    <img src="https://via.placeholder.com/400x200?text=Sound+{{ $package->image }}" class="card-img-top" alt="Sound System">
                    <div class="card-body text-center p-4">
                        <h4 class="card-title text-primary-rose fw-bold">{{ $package->name }}</h4>
                        <h5 class="fw-bolder text-dark">Harga: Rp {{ number_format($package->price, 0, ',', '.') }}</h5>
                        <p class="card-text text-secondary mb-2">{{ $package->description }}</p>
                        <button class="btn btn-sm btn-primary-rose mt-3 w-100">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>
        <section class="container py-5">

        @php

            $lineArrayTitle = $product1->firstWhere('category_id', 1)->nama_kategori ?? 'Sound System Line Array';

        @endphp

       

        <h2 class="text-center text-dark fw-bold mb-5">{{ $lineArrayTitle }}</h2>

       

        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

           

            @foreach ($product1 as $package)

            @if($package->category_id == 1)

            <div class="col">

                <div class="card bg-white h-100 border border-primary-rose shadow-lg card-hover-scale">

                    <img src="https://via.placeholder.com/400x200?text=Line+Array" class="card-img-top" alt="Line Array">

                    <div class="card-body text-center p-4">

                        <h4 class="card-title text-primary-rose fw-bold">{{ $package->name }}</h4>

                        <p class="card-text text-secondary mb-2">{{ $package->description }}</p>

                        <h5 class="fw-bolder text-dark">Harga Mulai: Rp {{ number_format($package->price, 0, ',', '.') }}</h5>

                        <button class="btn btn-sm btn-primary-rose mt-3 w-100">Konsultasi Harga</button>

                    </div>

                </div>

            </div>

            @endif

            @endforeach

           

        </div>

    </section>



    {{-- SECTION 5: LIVE STREAMING --}}

    <section class="container py-5">

        @php

            $liveStreamTitle = $product1->firstWhere('category_id', 3)->nama_kategori ?? 'Live Streaming';

        @endphp

       

        <h2 class="text-center text-dark fw-bold mb-5">{{ $liveStreamTitle }}</h2>

       

        <div class="row row-cols-1 row-cols-md-3 g-4 pt-2">

           

            @foreach ($product1 as $package)

            @if($package->category_id == 3)

            <div class="col">

                <div class="card bg-white h-100 border border-primary-rose shadow-lg text-center card-hover-scale">

                    <div class="card-body p-4">

                        <h5 class="text-primary-rose fw-bold">{{ $package->name }}</h5>

                        <h4 class="fw-bolder text-dark mt-4">Rp {{ number_format($package->price, 0, ',', '.') }},-</h4>

                        <hr>

                        <ul class="list-unstyled small text-secondary">

                             <li><i class="fas fa-check-circle me-1 text-primary-rose"></i> {{ $package->description }}</li>

                        </ul>

                        <button class="btn btn-sm btn-primary-rose mt-3 w-100">Pesan Sekarang</button>

                    </div>

                </div>

            </div>

            @endif

            @endforeach

           

        </div>

       

        <h4 class="text-center text-dark fw-bold mt-5 mb-4">Cara Kerja Live Streaming Kami</h4>

       

        <div class="text-center">

            <img src="https://via.placeholder.com/900x300?text=Live+Streaming+Workflow+Diagram" class="img-fluid rounded-lg shadow-lg" alt="Workflow Diagram">

            <p class="small text-secondary mt-3">Output siaran dapat disiarkan ke berbagai platform seperti YouTube, Zoom, atau platform kustom.</p>

        </div>

    </section>


    {{-- ========================================================== --}}
    {{-- 4. KEUNGGULAN VENDOR (ACCORDION) --}}
    {{-- ========================================================== --}}


    {{-- 5. SECTION LINE ARRAY & LIVE STREAM (Contoh Section Lain) --}}
    
    {{-- 6. MITRA KERJASAMA --}}
    <section id="partners" class="py-5 py-md-5 bg-white">
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
                        <div class="rounded-circle border border-1 border-secondary p-3 bg-light d-flex align-items-center justify-content-center shadow-sm"
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
{{-- ========================================================== --}}
    {{-- SECTION 7: TIM ORGANISASI --}}
    {{-- ========================================================== --}}
    <section id="our-team" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-2 text-dark">Meet Our Amazing Team</h2>
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
                <div class="card bg-white h-100 border-0 shadow-sm text-center card-hover-scale">
                    <div class="card-body p-4">
                        
                        {{-- Gambar Tim (Circular) --}}
                        <div class="d-flex justify-content-center mb-3">
                            <img src="https://via.placeholder.com/150x150?text={{ $member['img'] }}" 
                                 class="rounded-circle border border-3 border-primary-rose shadow" 
                                 alt="{{ $member['name'] }}" 
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        </div>

                        <h5 class="fw-bold text-dark mb-1">{{ $member['name'] }}</h5>
                        <p class="small text-primary-rose">{{ $member['role'] }}</p>
                        <p class="small text-secondary mt-3">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                        
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>
    
    <hr class="container border-primary-rose my-5">
    
    {{-- LANJUTKAN DENGAN SECTION 6: MITRA KERJASAMA --}}
    <section class="bg-primary-rose text-white mt-5 py-5 text-center">
        <h3 class="fw-bold mb-3">Langkahkah Lagi untuk Bikin Event Kamu KEREN!</h3>
        <button class="btn btn-lg bg-dark text-white">Konsultasi Gratis Sekarang</button>
    </section>
<section class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold text-dark mb-2">Pertanyaan yang Sering Diajukan (FAQ)</h2>
        <p class="lead text-primary-rose">Temukan jawaban atas pertanyaan umum seputar layanan kami.</p>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="accordion" id="faqAccordion"> {{-- ID diubah menjadi faqAccordion --}}
                
                {{-- Item 1: Q: Kualitas Sound System --}}
                <div class="accordion-item shadow-sm border-primary-rose">
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
                <div class="accordion-item shadow-sm border-primary-rose mt-3">
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

                {{-- Item 3: Q: Coverage Area (Contoh Pertanyaan Baru) --}}
                <div class="accordion-item shadow-sm border-primary-rose mt-3">
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