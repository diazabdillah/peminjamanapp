@extends('layouts.app')

@section('title', 'Category - eStore')

@section('content')

<div class="container my-5">
    
    <nav aria-label="breadcrumb" class="mb-4 d-none d-md-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-secondary text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-secondary text-decoration-none">Category</a></li>
            <li class="breadcrumb-item active text-primary-custom" aria-current="page">Clothing</li>
        </ol>
    </nav>
    
    <div class="row">
        
        <div class="col-lg-3">
            
            <h5 class="fw-bold mb-4 d-none d-lg-block">Categories</h5>

            <div class="accordion" id="categoryFilterAccordion">
                
                {{-- Kategori Utama --}}
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center fw-bold small" data-bs-toggle="collapse" data-bs-target="#collapseCategories">
                        Categories
                        <i class="fas fa-chevron-down small"></i>
                    </div>
                    <div id="collapseCategories" class="accordion-collapse collapse show">
                        <ul class="list-group list-group-flush small">
                            {{-- Data Kategori dinamis dari database --}}
                            @php
                                $mainCategories = [
                                    ['name' => 'Clothing', 'count' => 90],
                                    ['name' => 'Home & Kitchen', 'count' => 12],
                                    ['name' => 'Beauty & Personal Care', 'count' => 45],
                                    ['name' => 'Sports & Outdoors', 'count' => 18],
                                    ['name' => 'Books', 'count' => 7],
                                    ['name' => 'Toys & Games', 'count' => 3],
                                ];
                            @endphp
                            @foreach ($mainCategories as $cat)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2">
                                    <a href="#" class="text-dark text-decoration-none">{{ $cat['name'] }}</a>
                                    <span class="badge text-bg-light text-secondary">{{ $cat['count'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Filter Harga (Price Range) --}}
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-header bg-white border-0 py-3 fw-bold small" data-bs-toggle="collapse" data-bs-target="#collapsePrice">
                        Price Range
                    </div>
                    <div id="collapsePrice" class="accordion-collapse collapse show">
                        <div class="card-body">
                            {{-- Simulasi Range Slider --}}
                            <input type="range" class="form-range" min="0" max="500" value="100" id="priceRangeSlider">
                            <div class="d-flex justify-content-between small text-secondary">
                                <span class="fw-bold">$0</span>
                                <span class="fw-bold">$500</span>
                            </div>
                            <div class="mt-3">
                                <label class="form-label small">Current Range:</label>
                                <div class="d-flex">
                                    <input type="number" class="form-control form-control-sm me-2" value="100" placeholder="Min">
                                    <input type="number" class="form-control form-control-sm" value="500" placeholder="Max">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary w-100 mt-3">Apply Filter</button>
                        </div>
                    </div>
                </div>

                {{-- Filter Warna --}}
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-header bg-white border-0 py-3 fw-bold small" data-bs-toggle="collapse" data-bs-target="#collapseColor">
                        Filter by Color
                    </div>
                    <div id="collapseColor" class="accordion-collapse collapse show">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $colors = ['#000', '#dc3545', '#ffc107', '#28a745', '#007bff', '#6f42c1', '#17a2b8', '#fd7e14'];
                                @endphp
                                @foreach ($colors as $color)
                                    <a href="#" style="background-color: {{ $color }}; width: 25px; height: 25px;" class="rounded-circle border border-1 border-secondary shadow-sm" title="{{ $color }}"></a>
                                @endforeach
                            </div>
                            <button class="btn btn-sm btn-link text-decoration-none mt-3 p-0 small text-primary-custom">Clear All</button>
                            <button class="btn btn-sm btn-outline-secondary w-100 mt-3">Apply Filter</button>
                        </div>
                    </div>
                </div>

                {{-- Filter Brand --}}
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-header bg-white border-0 py-3 fw-bold small" data-bs-toggle="collapse" data-bs-target="#collapseBrand">
                        Filter by Brand
                    </div>
                    <div id="collapseBrand" class="accordion-collapse collapse show">
                        <ul class="list-group list-group-flush small">
                            @php
                                $brands = ['Nike' => 35, 'Adidas' => 44, 'Puma' => 12, 'Uniqlo' => 10, 'New Balance' => 18, 'Converse' => 5];
                            @endphp
                            @foreach ($brands as $brand => $count)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="{{ $brand }}">
                                        <label class="form-check-label" for="{{ $brand }}">
                                            {{ $brand }}
                                        </label>
                                    </div>
                                    <span class="badge text-bg-light text-secondary">{{ $count }}</span>
                                </li>
                            @endforeach
                        </ul>
                         <div class="card-body pt-0">
                            <button class="btn btn-sm btn-link text-decoration-none mt-2 p-0 small text-primary-custom">Apply Filter</button>
                             <a href="#" class="btn btn-sm btn-link text-decoration-none mt-2 p-0 small text-secondary float-end">Clear All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            
            <div class="d-flex flex-wrap justify-content-between align-items-center p-3 mb-4 rounded-3 border bg-white shadow-sm">
                
                <div class="small">
                    <span class="fw-bold me-2 d-none d-sm-inline">Active Filters:</span>
                    <span class="badge text-bg-primary-custom rounded-pill me-2">Electronics <a href="#" class="text-white ms-1"><i class="fas fa-times small"></i></a></span>
                    <span class="badge text-bg-primary-custom rounded-pill me-2">$50 to $100 <a href="#" class="text-white ms-1"><i class="fas fa-times small"></i></a></span>
                    <a href="#" class="btn btn-link btn-sm text-decoration-none text-secondary">Clear All</a>
                </div>

                <div class="d-flex align-items-center small mt-2 mt-sm-0">
                    <span class="text-secondary me-2 d-none d-sm-inline">Sort By</span>
                    <select class="form-select form-select-sm me-3" style="width: auto;">
                        <option>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                    </select>
                    
                    <span class="text-secondary me-2 d-none d-sm-inline">View</span>
                    <div class="btn-group btn-group-sm me-3" role="group">
                        <button type="button" class="btn btn-outline-secondary active"><i class="fas fa-th"></i></button>
                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-list"></i></button>
                    </div>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option>12 per page</option>
                        <option>24 per page</option>
                    </select>
                </div>
            </div>
            
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @php
                    $products = [
                        ['name' => 'Vestibulum ante ipsum primis', 'price' => 149.99, 'rating' => 4.0, 'status' => 'new', 'image' => 'Sunglasses'],
                        ['name' => 'Aliquam tincidunt mauris eu risus', 'price' => 139.99, 'rating' => 4.5, 'status' => 'sale', 'image' => 'Backpack'],
                        ['name' => 'Cras ornare tristique elit', 'price' => 89.50, 'rating' => 3.8, 'status' => 'none', 'image' => 'ToteBag'],
                        ['name' => 'Integer vitae libero ac risus', 'price' => 119.00, 'rating' => 5.0, 'status' => 'none', 'image' => 'RunningShoes'],
                        ['name' => 'Donec eu libero sit amet quam', 'price' => 75.00, 'rating' => 4.7, 'status' => 'sale', 'image' => 'Chair'],
                        ['name' => 'Pellentesque habitant morbi tristique', 'price' => 64.95, 'rating' => 3.6, 'status' => 'new', 'image' => 'Sneakers'],
                        // Ulangi 6 item untuk mengisi grid
                        ['name' => 'Vestibulum ante ipsum primis', 'price' => 149.99, 'rating' => 4.0, 'status' => 'new', 'image' => 'Watch'],
                        ['name' => 'Aliquam tincidunt mauris eu risus', 'price' => 139.99, 'rating' => 4.5, 'status' => 'sale', 'image' => 'Hoodie'],
                        ['name' => 'Cras ornare tristique elit', 'price' => 89.50, 'rating' => 3.8, 'status' => 'none', 'image' => 'Dress'],
                        ['name' => 'Integer vitae libero ac risus', 'price' => 119.00, 'rating' => 5.0, 'status' => 'none', 'image' => 'Jeans'],
                        ['name' => 'Donec eu libero sit amet quam', 'price' => 75.00, 'rating' => 4.7, 'status' => 'sale', 'image' => 'Hat'],
                        ['name' => 'Pellentesque habitant morbi tristique', 'price' => 64.95, 'rating' => 3.6, 'status' => 'new', 'image' => 'Scarf'],
                    ];
                @endphp

                @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative">
                            <img src="https://via.placeholder.com/300x350?text={{ $product['image'] }}" class="card-img-top" alt="Product Image">
                            
                            @if ($product['status'] == 'new')
                                <span class="badge text-bg-success position-absolute top-0 start-0 mt-2 ms-2">NEW</span>
                            @elseif ($product['status'] == 'sale')
                                <span class="badge text-bg-danger position-absolute top-0 end-0 mt-2 me-2">SALE</span>
                            @endif
                            <button class="btn btn-light rounded-circle btn-sm position-absolute bottom-0 end-0 mb-2 me-2"><i class="fas fa-shopping-cart small"></i></button>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="card-title fw-semibold small text-dark">{{ $product['name'] }}</h6>
                            <div class="rating-color small mb-2">
                                {{-- Rating logic placeholder --}}
                                @for ($i = 0; $i < floor($product['rating']); $i++) <i class="fas fa-star"></i> @endfor
                                @if ($product['rating'] - floor($product['rating']) > 0) <i class="fas fa-star-half-alt"></i> @endif
                                @for ($i = 0; $i < 5 - ceil($product['rating']); $i++) <i class="far fa-star"></i> @endfor
                                
                            </div>
                            <p class="card-text text-primary-custom fw-bold m-0">${{ number_format($product['price'], 2) }}</p>
                             @if ($product['status'] == 'sale')
                                <s class="text-secondary small ms-2">$150.00</s>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="d-flex justify-content-center mt-5">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
    </div>
</div>

@endsection