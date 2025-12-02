@extends('layouts.app')

@section('title', 'Keranjang Belanja Anda')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold text-dark mb-4 border-bottom border-rose-secondary pb-3">
        <i class="fas fa-shopping-cart text-rose-primary me-2"></i> Keranjang Belanja
    </h1>

    @php
        // Dummy Data
        $cartItems = $cartItems ?? collect([
            (object)['id' => 1, 'quantity' => 1, 'product' => (object)['name' => 'Paket Sound Standard', 'price' => 4500000, 'image' => 'sound.jpg']],
            (object)['id' => 2, 'quantity' => 2, 'product' => (object)['name' => 'Jasa Live Streaming Pro', 'price' => 2500000, 'image' => 'live.jpg']],
        ]);
        $subtotal = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
        $shippingCost = 50000;
        $total = $subtotal + $shippingCost;
    @endphp

    @if ($cartItems->isEmpty())
        <div class="alert alert-light text-center py-5 border">
            <h4 class="fw-bold">Keranjang Belanja Anda Kosong.</h4>
        </div>
    @else
        <div class="row">
            
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        @foreach ($cartItems as $item)
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                            <img src="https://via.placeholder.com/80x80?text={{ $item->product->image }}" 
                                 class="rounded me-3 border" 
                                 style="width: 80px; height: 80px; object-fit: cover;" 
                                 alt="{{ $item->product->name }}">
                            
                            <div class="flex-grow-1">
                                <h5 class="fw-bold text-dark mb-0">{{ $item->product->name }}</h5>
                                <p class="small text-rose-primary mb-1">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                            </div>
                            
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center me-4">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                       class="form-control form-control-sm text-center me-2" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                            </form>

                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-lg bg-light border-rose-secondary">
                    <div class="card-header bg-rose-primary text-white fw-bold">
                        Ringkasan Pesanan
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-secondary">Subtotal Barang</span>
                            <span class="fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-secondary">Biaya Pengiriman</span>
                            <span class="fw-bold">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                        </div>

                        <div class="d-flex justify-content-between border-top pt-3">
                            <h5 class="fw-bolder text-dark">TOTAL</h5>
                            <h5 class="fw-bolder text-rose-primary">Rp {{ number_format($total, 0, ',', '.') }}</h5>
                        </div>

                        <a href="{{ route('checkout.show') }}" class="btn btn-rose-primary w-100 mt-3 fw-bold">
                            Lanjutkan ke Checkout &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection