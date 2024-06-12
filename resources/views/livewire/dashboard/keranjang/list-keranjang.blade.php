<div class="dropdown topbar-head-dropdown ms-1 header-item">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-shopping-bag fs-22'></i>
        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-info">
            {{ $keranjangs->count() }}
        </span>
    </button>
    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart"
        aria-labelledby="page-header-cart-dropdown">
        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                </div>
                <div class="col-auto">
                    <span class="badge bg-warning-subtle text-warning fs-13">
                        <span>{{ $keranjangs->count() }}</span> items
                    </span>
                </div>
            </div>
        </div>
        <div style="max-height: 300px;overflow-y: auto;">
            <div class="p-2">
                @if ($keranjangs->count() == 0)
                <div class="text-center ">
                    <div class="avatar-md mx-auto my-3">
                        <div class="avatar-title bg-info-subtle text-info fs-36 rounded-circle">
                            <i class='bx bx-cart'></i>
                        </div>
                    </div>
                    <h5 class="mb-3">Your Cart is Empty!</h5>
                </div>
                @else
                @foreach ($keranjangs as $keranjang)
                <div class="d-block dropdown-item text-wrap px-3 py-2">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(Storage::url($keranjang->produk->gambar)) }}"
                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                        <div class="flex-grow-1">
                            <h6 class="mt-0 mb-1 fs-14">
                                <a href="apps-ecommerce-product-details.html" class="text-reset">
                                    {{ $keranjang->produk->nama_produk }}
                                </a>
                            </h6>
                            <p class="mb-0 fs-12 text-muted">
                                Jumlah: <span>{{ $keranjang->jml_pesan }} x Rp {{
                                    number_format($keranjang->produk->harga , 2 , ',' , '.') }}</span>
                            </p>
                        </div>
                        <div class="px-2">
                            <h5 class="m-0 fw-normal">Rp <span class="cart-item-price">{{
                                    number_format(($keranjang->jml_pesan * $keranjang->produk->harga) , 2 , ',' , '.')
                                    }}</span></h5>
                        </div>
                        <div class="ps-2">
                            <button type="button"
                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn shadow-none"
                                wire:click="deleteItem({{ $keranjang->id }})">
                                <i class="ri-close-fill fs-16"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @if ($keranjangs->count() != 0)
        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border">
            <div class="d-flex justify-content-between align-items-center pb-3">
                <h5 class="m-0 text-muted">Total:</h5>
                <div class="px-2">
                    @php
                    $total = 0 ;
                    foreach ($keranjangs as $keranjang) {
                    $subTotal = $keranjang->jml_pesan * $keranjang->produk->harga ;
                    $total += $subTotal ;
                    }
                    @endphp
                    <h5 class="m-0">Rp {{ number_format($total , 2 , ',' , '.') }}</h5>
                </div>
            </div>

            <button class="btn btn-success text-center w-100" wire:loading.class='d-none'>
                Checkout
            </button>
        </div>
        @endif
    </div>
</div>