{{-- FOOTER (Menggunakan background Light/White dan aksen Rose) --}}
<footer class="mt-auto py-5 bg-light">
    <div class="container-fluid container-lg">
        <div class="row">
            
            <div class="col-md-4 mb-4 mb-md-0">
                <img src="{{ asset('images/mutiara_logo.png') }}" alt="Mutiara Entertainment Logo" style="height: 150px;">
                <p class="small text-secondary">
                    Mutiara Entertainment. <br>
                    Event Organizer dan Wedding Planner terbaik di kota Anda.
                </p>
                <div class="">
                    <a href="#" class="text-primary-rose me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-primary-rose me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
                    <a href="#" class="text-primary-rose me-3"><i class="fas fa-envelope fa-lg"></i></a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">LAYANAN KAMI</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Wedding Planner</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Corporate Events</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Penyewaan Alat</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-sm-6 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">INFORMASI</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ url('/price-list') }}" class="text-secondary text-decoration-none">Daftar Harga</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Blog & Tips</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Karir</a></li>
                </ul>
            </div>
            
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">HUBUNGI KAMI</h5>
                
                {{-- Kontak 1: Lokasi (Menggunakan d-flex agar ikon dan teks sejajar) --}}
                <p class="small text-secondary d-flex align-items-start mb-2">
                    <i class="fas fa-map-marker-alt me-2 mt-1 text-primary-rose flex-shrink-0"></i> 
                    <span>
                        Jl. Contoh Kebahagiaan No. 10, <br>
                        Jakarta, Indonesia
                    </span>
                </p>

                {{-- Kontak 2: Telepon --}}
                <p class="small text-secondary d-flex align-items-center mb-2">
                    <i class="fas fa-phone me-2 text-primary-rose flex-shrink-0"></i> 
                    <span>+62 812-XXXX-XXXX</span>
                </p>

                {{-- Kontak 3: Email --}}
                <p class="small text-secondary d-flex align-items-center">
                    <i class="fas fa-envelope me-2 text-primary-rose flex-shrink-0"></i> 
                    <span>hello@mutiaraent.com</span>
                </p>
            </div>
        </div>
        
        <div class="border-top border-secondary opacity-50 mt-4 pt-3 text-center">
            <p class="text-secondary small mb-0">
                &copy; {{ date('Y') }} Mutiara Entertainment. All rights reserved.
            </p>
        </div>
    </div>
</footer>