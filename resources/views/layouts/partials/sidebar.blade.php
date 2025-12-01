{{-- SIDEBAR (Dikonversi ke Bootstrap 5) --}}
<div class="sticky-top" style="top: 70px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold text-dark border-bottom pb-3 mb-3">
                <i class="fas fa-layer-group me-2" style="color: #20c997;"></i> Kategori Produk
            </h5>
            
            <ul class="list-group list-group-flush">
                @php
                    $categories = ['Sound System', 'Lighting', 'LED Screen', 'Rigging', 'Aksesoris'];
                @endphp

                @foreach ($categories as $category)
                    <li class="list-group-item px-0">
                        <a href="{{ route('products.category', str()->slug($category)) }}" 
                           class="text-dark text-decoration-none d-block p-2 rounded-3 hover-bg-light">
                            {{ $category }}
                        </a>
                    </li>
                @endforeach
                <li class="list-group-item px-0 pt-3 border-top">
                    <a href="{{ route('products.index') }}" 
                       class="text-decoration-none fw-semibold d-block p-2 rounded-3" style="color: #20c997;">
                        Lihat Semua Produk
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
{{-- Tambahkan style kustom di CSS Anda untuk 'hover-bg-light' jika diperlukan --}}