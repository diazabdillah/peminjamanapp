{{-- File: resources/views/partials/product_sections/sound_system.blade.php --}}

<section class="container py-5">
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
        @foreach ($products as $package)

        <div class="col">
            <div class="card bg-white h-100 border border-primary-rose shadow-lg card-hover-scale">
                <img src="https://via.placeholder.com/400x200?text=Sound+{{ $package->image }}" class="card-img-top" alt="Sound System">
                <div class="card-body text-center p-4 d-flex flex-column">
                    
                    <h4 class="card-title text-primary-rose fw-bold">{{ $package->name }}</h4>
                    <p class="card-text text-secondary mb-3 small">{{ $package->description }}</p>
                    <h5 class="fw-bolder text-dark mt-auto mb-3">Harga: Rp {{ number_format($package->price, 0, ',', '.') }}</h5>
                    
                    {{-- DUAL CTA BUTTONS CONTAINER --}}
                    <div class="d-flex justify-content-between gap-2"> {{-- Gunakan d-flex untuk penjajaran horizontal --}}
                        
                        {{-- 1. FORM ADD TO CHART (DENGAN PLUS/MINUS) --}}
                        <form action="{{ route('cart.store') }}" method="POST" class="flex-grow-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $package->id }}">
                            
                            {{-- Input Group untuk Plus/Minus/Qty --}}
                            <div class="input-group input-group-sm mb-2" style="max-width: 100%;">
                                
                                {{-- Tombol Minus --}}
                                <button type="button" class="btn btn-outline-secondary btn-qty-minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>
                                
                                {{-- Input Kuantitas --}}
                                <input type="number" name="quantity" value="1" min="1" class="form-control text-center" required> 
                                
                                {{-- Tombol Plus --}}
                                <button type="button" class="btn btn-outline-secondary btn-qty-plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>

                                {{-- Tombol Submit (Di luar input-group, agar sejajar) --}}
                                <button type="submit" class="btn btn-primary-rose ms-2">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </form>
                        
                        {{-- 2. PESAN LANGSUNG (Link ke Checkout) --}}
                        <a href="{{ url('/checkout/direct/' . $package->id) }}" class="btn btn-sm btn-outline-secondary flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 40%;">
                            <i class="fas fa-bolt me-1"></i> Pesan Langsung
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</section>