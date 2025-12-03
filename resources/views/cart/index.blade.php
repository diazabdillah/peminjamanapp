@extends('layouts.app')

@section('title', 'Keranjang Belanja Anda')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold text-dark mb-4 border-bottom border-rose-secondary pb-3">
        <i class="fas fa-shopping-cart text-rose-primary me-2"></i> Keranjang Belanja
    </h1>

    {{-- Tampilkan Notifikasi (jika ada) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @php
        // Data Barang Tambahan (Tambahan Baru)
        $optionalItems = [
            ['id' => 'opt1', 'name' => 'Asuransi Kerusakan Alat', 'price' => 250000],
            ['id' => 'opt2', 'name' => 'Extra 2 Jam Layanan', 'price' => 500000],
            ['id' => 'opt3', 'name' => 'Extra 1 Jam Layanan', 'price' => 600000],
            ['id' => 'opt4', 'name' => 'Extra 3 Jam Layanan', 'price' => 800000],
        ];
        // Pastikan $cartItems dan $subtotal tersedia dari Controller
        $subtotal = $subtotal ?? 0;
        $cartItems = $cartItems ?? collect();
        $total = $subtotal; // Total awal sama dengan subtotal item utama
    @endphp

    @if ($cartItems->isEmpty())
        <div class="alert alert-light text-center py-5 border">
            <h4 class="fw-bold">Keranjang Belanja Anda Kosong.</h4>
            <a href="{{ url('/') }}" class="btn btn-rose-primary mt-3">Mulai Belanja</a>
        </div>
    @else
        <div class="row">

            <div class="col-lg-8 mb-4">

                {{-- ITEM LIST --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">Item Utama</h5>
                        
                        {{-- Tombol Kosongkan Keranjang --}}
                        <div class="d-flex justify-content-end mb-3">
                            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Anda yakin ingin mengosongkan seluruh keranjang belanja?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash-alt me-1"></i> Kosongkan Keranjang
                                </button>
                            </form>
                        </div>

                        @foreach ($cartItems as $item)
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3" data-product-id="{{ $item->product->id }}" data-price="{{ $item->product->price }}">
                            
                            {{-- Image (Placeholder) --}}
                            <img src="{{ asset('images/' . ($item->product->image ?? 'placeholder.jpg')) }}" alt="{{ $item->product->name }}" class="me-3 rounded" style="width: 80px; height: 80px; object-fit: cover;">
                            
                            {{-- Item Details --}}
                            <div class="flex-grow-1">
                                <h5 class="fw-bold text-dark mb-0 cart-item-name">{{ $item->product->name }}</h5>
                                <p class="small text-rose-primary mb-1">Rp {{ number_format($item->product->price, 0, ',', '.') }} x <span class="cart-item-qty">{{ $item->quantity }}</span></p>
                                <p class="mb-0 fw-bold">Subtotal: Rp <span class="cart-item-subtotal-display">{{ number_format($item->subtotal, 0, ',', '.') }}</span></p>
                            </div>
                            
                            {{-- Kuantitas dan Hapus Form --}}
                            <div class="d-flex align-items-center ms-auto">
                                
                                {{-- Quantity Input with +/- buttons --}}
                                <form action="{{ route('cart.update', $item->product->id) }}" method="POST" class="d-flex update-cart-form me-3">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">

                                    <div class="input-group input-group-sm" style="width: 130px;">
                                        <button class="btn btn-outline-secondary btn-minus" type="button" data-id="{{ $item->product->id }}">-</button>
                                        <input type="number" name="quantity" class="form-control text-center cart-quantity-input" 
                                            value="{{ $item->quantity }}" min="1" 
                                            data-id="{{ $item->product->id }}" 
                                            style="max-width: 50px;">
                                        <button class="btn btn-outline-secondary btn-plus" type="button" data-id="{{ $item->product->id }}">+</button>
                                        <button type="submit" class="btn btn-primary d-none submit-update-btn" data-id="{{ $item->product->id }}">Update</button>
                                    </div>
                                </form>

                                {{-- Delete Form --}}
                                <form action="{{ route('cart.destroy', $item->product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $item->product->name }} dari keranjang?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- SECTION BARANG TAMBAHAN --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">Barang Tambahan (Opsional)</h5>
                        <ul class="list-group list-group-flush" id="optional-items-list">
                            @foreach ($optionalItems as $opt)
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light px-0">
                                <div class="form-check">
                                    <input class="form-check-input optional-item-checkbox" type="checkbox" 
                                        value="{{ $opt['price'] }}" id="{{ $opt['id'] }}" 
                                        data-name="{{ $opt['name'] }}">
                                    <label class="form-check-label" for="{{ $opt['id'] }}">
                                        {{ $opt['name'] }}
                                    </label>
                                </div>
                                <span class="fw-bold text-rose-primary" data-price="{{ $opt['price'] }}">
                                    + Rp {{ number_format($opt['price'], 0, ',', '.') }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card shadow-lg bg-light border-rose-secondary sticky-top" style="top: 20px;">
                    <div class="card-header bg-rose-primary text-white fw-bold">Ringkasan Pesanan</div>
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-secondary">Subtotal Barang Utama</span>
                            <span class="fw-bold" id="subtotal-main-display" data-subtotal="{{ $subtotal }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        {{-- TEMPAT BARANG TAMBAHAN DIRINCI --}}
                        <div id="optional-details-list" class="mb-3 ps-2 border-start border-1">
                            <p class="small text-muted mb-0">Biaya Tambahan:</p>
                            {{-- Rincian item tambahan akan di-inject di sini oleh JS --}}
                        </div>
                        {{-- END TEMPAT BARANG TAMBAHAN --}}

                        <div class="d-flex justify-content-between border-top pt-3">
                            <h5 class="fw-bolder text-dark">TOTAL AKHIR</h5>
                            <h5 class="fw-bolder text-rose-primary" id="total-final-display" data-total="{{ $subtotal }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</h5>
                        </div>

                        {{-- TOMBOL CHECKOUT DIGANTI ID --}}
                        <button type="button" id="whatsappCheckoutBtn" class="btn btn-success w-100 mt-3 fw-bold">
                            <i class="fab fa-whatsapp me-2"></i> Lanjut Pesan via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainSubtotal = {{ $subtotal }};
        const checkboxes = document.querySelectorAll('.optional-item-checkbox');
        const optionalDetailsList = document.getElementById('optional-details-list');
        const totalFinalDisplay = document.getElementById('total-final-display');
        const whatsappCheckoutBtn = document.getElementById('whatsappCheckoutBtn');
        
        const quantityInputs = document.querySelectorAll('.cart-quantity-input');
        const btnPluses = document.querySelectorAll('.btn-plus');
        const btnMinuses = document.querySelectorAll('.btn-minus');

        const whatsappNumber = '6285230292181'; // Ganti dengan nomor WhatsApp Anda

        function formatRupiah(number) {
            return number.toLocaleString('id-ID', { minimumFractionDigits: 0 });
        }
        
        // --- Fungsi Utama untuk Menghitung dan Update Tampilan ---
        function calculateTotals() {
            let optionalCost = 0;
            optionalDetailsList.innerHTML = '<p class="small text-muted mb-0">Biaya Tambahan:</p>'; // Reset list
            
            // 1. Hitung Biaya Tambahan dan Update Rincian
            const selectedOptionalItems = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const price = parseFloat(checkbox.value);
                    const name = checkbox.dataset.name;
                    optionalCost += price;
                    selectedOptionalItems.push({ name, price });

                    // INJECT RINCIAN BARU KE RINGKASAN
                    const detailItem = document.createElement('div');
                    detailItem.classList.add('d-flex', 'justify-content-between', 'small', 'text-secondary', 'ps-2');
                    detailItem.innerHTML = `
                        <span class="text-dark-50">${name}</span>
                        <span class="text-primary-rose fw-bold">+ Rp ${formatRupiah(price)}</span>
                    `;
                    optionalDetailsList.appendChild(detailItem);
                }
            });

            const finalTotal = mainSubtotal + optionalCost;
            
            // Perbarui display total
            totalFinalDisplay.textContent = 'Rp ' + formatRupiah(finalTotal);
            totalFinalDisplay.dataset.total = finalTotal; // Simpan nilai mentah di data attribute

            // 2. Siapkan Pesan WhatsApp
            generateWhatsAppMessage(mainSubtotal, selectedOptionalItems, finalTotal);
        }

        // --- Fungsi untuk Membuat Pesan WhatsApp ---
        function generateWhatsAppMessage(subtotal, optionalItems, total) {
            let message = "Halo, saya ingin melakukan pemesanan berikut:\n\n";
            
            message += "==============================\n";
            message += "*Rincian Item Utama:*\n";
            
            // Ambil rincian item utama dari DOM (karena kuantitasnya bisa diubah)
            document.querySelectorAll('.border-bottom.pb-3.mb-3').forEach(itemElement => {
                const name = itemElement.querySelector('.cart-item-name').textContent.trim();
                const qty = itemElement.querySelector('.cart-quantity-input').value;
                const price = parseFloat(itemElement.dataset.price);
                const itemSubtotal = qty * price;

                message += `• ${name} (${qty}x) = Rp ${formatRupiah(itemSubtotal)}\n`;
            });

            message += "\n*Item Tambahan (Opsional):*\n";
            if (optionalItems.length === 0) {
                message += "• Tidak ada item tambahan dipilih.\n";
            } else {
                optionalItems.forEach(item => {
                    message += `• ${item.name} = +Rp ${formatRupiah(item.price)}\n`;
                });
            }

            message += "==============================\n";
            message += `*Subtotal Item Utama:* Rp ${formatRupiah(subtotal)}\n`;
            message += `*Total Biaya Tambahan:* Rp ${formatRupiah(optionalItems.reduce((sum, item) => sum + item.price, 0))}\n`;
            message += `*TOTAL AKHIR:* *Rp ${formatRupiah(total)}*\n`;
            message += "==============================\n\n";
            message += "Mohon diproses, terima kasih.";

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            
            // Set href tombol
            whatsappCheckoutBtn.onclick = () => window.open(whatsappUrl, '_blank');
        }

        // --- Logic Tombol Plus/Minus dan Update Qty (Tetap Dijalankan) ---
        
        btnPluses.forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.id;
                const input = document.querySelector(`.cart-quantity-input[data-id="${productId}"]`);
                input.value = parseInt(input.value) + 1;
                this.closest('form').submit(); 
            });
        });

        btnMinuses.forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.id;
                const input = document.querySelector(`.cart-quantity-input[data-id="${productId}"]`);
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    this.closest('form').submit();
                }
            });
        });

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                 if (parseInt(this.value) < 1) {
                     this.value = 1;
                 }
                 this.closest('form').submit();
            });
        });
        
        // --- Logic Barang Tambahan & Inisialisasi ---

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotals);
        });

        // Initial calculation on load
        calculateTotals();
    });
</script>
@endpush
@endsection