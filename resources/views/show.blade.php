@extends('layouts.app')

@section('title', $product->name ?? 'Product Details')

@section('content')

<div class="container my-5">
    
    <nav aria-label="breadcrumb" class="mb-4 d-none d-md-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-secondary text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active text-primary-custom" aria-current="page">Product Details</li>
        </ol>
    </nav>
    
    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-3">
                <img src="{{ asset('storage/' . $product->main_image_path ?? 'https://via.placeholder.com/600x600?text=Main+Image') }}" 
                     class="img-fluid rounded" alt="{{ $product->name ?? 'Product Main Image' }}">
            </div>
            
            <div class="d-flex overflow-auto gap-2 p-1">
                {{-- Asumsi $product->images adalah koleksi dari ProductImage --}}
                @php
                    $thumbnails = $product->images ?? [1, 2, 3, 4, 5]; // Placeholder data
                @endphp
                @foreach ($thumbnails as $thumb)
                    <div class="border rounded p-1 cursor-pointer">
                        <img src="{{ asset('storage/' . $thumb->path ?? 'https://via.placeholder.com/100x100?text=Thumb') }}" 
                             class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;" alt="Thumbnail">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-6">
            <p class="text-secondary small fw-semibold m-0">{{ $product->category->name ?? 'HEADPHONES' }}</p>
            <h1 class="h3 fw-bold mb-3">{{ $product->name ?? 'Lorem Ipsum Wireless Noise Cancelling Headphones' }}</h1>
            
            <div class="d-flex align-items-center mb-3">
                <h4 class="text-primary-custom fw-bolder m-0 me-3">${{ number_format($product->price ?? 249.99, 2) }}</h4>
                <s class="text-secondary me-3">${{ number_format($product->old_price ?? 299.99, 2) }}</s>
                <span class="badge bg-danger me-3">-{{ $product->discount_percent ?? '30' }}%</span>
                
                <div class="rating-color small me-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                </div>
                <span class="small text-secondary">(47)</span>
            </div>

            <p class="text-secondary small mb-4">
                {{ $product->short_description ?? 'Mauris ipsum velit, laoreet ut lacus comosus, suscipit elit nec, tincidunt orci. Phasellus egestas nisl vitae lectus imperdiet venenatis.' }}
            </p>
            
            <p class="fw-bold small mb-3">
                <i class="fas fa-check-circle text-success me-1"></i> In Stock 
                <span class="text-secondary">({{ $product->stock ?? 24 }} items left)</span>
            </p>
            
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                {{-- Color Options --}}
                <div class="mb-3">
                    <label class="form-label small fw-bold">Color:</label>
                    <div class="d-flex gap-2">
                        @php $colors = ['#000', '#dc3545', '#ffc107', '#28a745', '#007bff', '#6f42c1', '#17a2b8']; @endphp
                        @foreach ($colors as $color)
                            <button type="button" class="btn border p-0 rounded-circle" style="background-color: {{ $color }}; width: 25px; height: 25px;"></button>
                        @endforeach
                    </div>
                </div>
                
                {{-- Size Options --}}
                <div class="mb-3">
                    <label class="form-label small fw-bold">Size:</label>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="size" id="sizeS" value="S" checked>
                        <label class="btn btn-outline-secondary btn-sm" for="sizeS">S</label>
                        
                        <input type="radio" class="btn-check" name="size" id="sizeM" value="M">
                        <label class="btn btn-outline-secondary btn-sm" for="sizeM">M</label>
                        
                        <input type="radio" class="btn-check" name="size" id="sizeL" value="L">
                        <label class="btn btn-outline-secondary btn-sm" for="sizeL">L</label>
                    </div>
                </div>

                {{-- Quantity --}}
                <div class="d-flex align-items-center mb-4">
                    <label class="form-label small fw-bold me-3 m-0">Quantity:</label>
                    <input type="number" name="quantity" class="form-control form-control-sm text-center me-3" value="1" min="1" max="{{ $product->stock ?? 10 }}" style="width: 70px;">
                </div>

                <div class="d-flex flex-wrap gap-2 mb-4">
                    <button type="submit" class="btn btn-primary-custom flex-grow-1"><i class="fas fa-cart-plus me-2"></i> Add to Cart</button>
                    <a href="{{ route('checkout.show') }}" class="btn btn-outline-primary flex-grow-1"><i class="fas fa-bolt me-2"></i> Buy Now</a>
                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-heart"></i></button>
                </div>
            </form>
            
            <div class="small text-secondary border-top pt-3">
                <p class="m-0"><i class="fas fa-shipping-fast me-2"></i> Free shipping over $50</p>
                <p class="m-0"><i class="fas fa-undo-alt me-2"></i> 30 day return policy</p>
                <p class="m-0"><i class="fas fa-shield-alt me-2"></i> 2 year warranty</p>
            </div>
        </div>
    </div>
    
    <hr class="my-5">

    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold text-dark" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold text-dark" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Product Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold text-dark" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews (47)</button>
                </li>
            </ul>

            <div class="tab-content pt-4" id="productTabsContent">
                
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <p class="text-secondary">{{ $product->description ?? 'Fusce vehicula justo a orci scelerisque... (Text placeholder)' }}</p>
                </div>
                
                <div class="tab-pane fade" id="overview" role="tabpanel">
                    <h5 class="fw-bold mb-3">Product Overview</h5>
                    <p class="text-secondary">Vestibulum at lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisl vitae lectus imperdiet venenatis. Suspendisse vulputate quam diam, et consectetur augue condimentum in. Aenean dapibus urna eget nisl pharetra, in iaculis nulla blandit. Praesent at consectetur sem, sed sollicitudin nibh. Ut interdum risus ac nulla placerat aliquet.</p>
                    
                    <h6 class="fw-bold mt-4">Key Features</h6>
                    <ul class="list-unstyled text-secondary small">
                        <li><i class="fas fa-check-circle text-primary-custom me-2"></i> Vestibulum at lacus congue, suscipit elit nec, tincidunt orci</li>
                        <li><i class="fas fa-check-circle text-primary-custom me-2"></i> Suspendisse vulputate quam diam, et consectetur augue condimentum in</li>
                        <li><i class="fas fa-check-circle text-primary-custom me-2"></i> Aenean dapibus urna eget nisl pharetra, in iaculis nulla blandit</li>
                        <li><i class="fas fa-check-circle text-primary-custom me-2"></i> Integer vitae libero ac risus</li>
                    </ul>
                    
                    <h6 class="fw-bold mt-4">What's in the Box</h6>
                    <ul class="list-unstyled text-secondary small">
                        <li><i class="fas fa-box-open text-primary-custom me-2"></i> Lorem Ipsum Wireless Headphones</li>
                        <li><i class="fas fa-box-open text-primary-custom me-2"></i> Carrying Case</li>
                        <li><i class="fas fa-box-open text-primary-custom me-2"></i> USB-C Charging Cable</li>
                        <li><i class="fas fa-box-open text-primary-custom me-2"></i> 3.5mm Audio Cable</li>
                        <li><i class="fas fa-box-open text-primary-custom me-2"></i> User Manual</li>
                    </ul>
                </div>
                
                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <p class="text-secondary">Review content goes here...</p>
                </div>

            </div>
        </div>
    </div>
    
    <div class="py-5 bg-light mt-5">
        <div class="container text-center">
            <h4 class="fw-bold mb-3">Join Our Newsletter</h4>
            <p class="text-secondary mb-4">Subscribe to get special offers, free giveaways, and once-in-a-lifetime deals.</p>
            <form class="d-flex justify-content-center">
                <input type="email" class="form-control me-2" placeholder="Subscribe to get special offers" style="max-width: 300px;">
                <button class="btn btn-primary-custom" type="submit">Subscribe</button>
            </form>
        </div>
    </div>

</div>
@endsection