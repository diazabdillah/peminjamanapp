{{-- FOOTER (Menggunakan background Light Pink dan aksen Rose) --}}
<footer class="mt-auto py-5 bg-secondary-white">
    <div class="container-fluid container-lg">
        <div class="row">
            
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/mutiara_logo.png') }}" alt="Mutiara Entertainment Logo" style="height: 60px;">
                <p class="small mt-3 text-secondary">
                    Mutiara Entertainment. <br>
                    Event Organizer dan Wedding Planner terbaik di kota Anda.
                </p>
                <div class="mt-3">
                    <a href="#" class="text-primary-rose me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-primary-rose me-2"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="text-primary-rose me-2"><i class="fas fa-envelope"></i></a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">LAYANAN KAMI</h5>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-secondary text-decoration-none">Wedding Planner</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Corporate Events</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Penyewaan Alat</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-sm-6 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">INFORMASI</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/price-list') }}" class="text-secondary text-decoration-none">Daftar Harga</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Blog & Tips</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Karir</a></li>
                </ul>
            </div>
            
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3 small text-dark">HUBUNGI KAMI</h5>
                <p class="small text-secondary m-0">
                    <i class="fas fa-map-marker-alt me-2 text-primary-rose"></i> Jakarta, Indonesia
                </p>
                 <p class="small text-secondary m-0">
                    <i class="fas fa-phone me-2 text-primary-rose"></i> +62 812-XXXX-XXXX
                </p>
            </div>
        </div>
        
        <div class="border-top border-secondary mt-4 pt-3 text-center">
            <p class="text-secondary small mb-0">
                &copy; {{ date('Y') }} Mutiara Entertainment. All rights reserved.
            </p>
        </div>
    </div>
</footer>