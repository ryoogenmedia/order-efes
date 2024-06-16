<div class="row mt-5">
    @foreach ($produks as $produk )

    <div class="col-lg-3 ">
        <div class="card explore-box card-animate">
            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                {{-- <button type="button" class="btn btn-icon active" data-bs-toggle="button" aria-pressed="true"><i
                        class="mdi mdi-cards-heart fs-16"></i></button> --}}
            </div>
            <div class="explore-place-bid-img">
                <img src="{{ asset(Storage::url($produk->gambar)) }}" alt="" class="card-img-top explore-img" />
                <div class="bg-overlay"></div>
                <div class="place-bid-btn text-center ">
                    <button class="btn btn-warning" wire:click="tambahKeranjang('{{ $produk->id }}')">
                        <i class="ri-shopping-cart-2-line"></i>
                        Keranjang
                    </button>
                    <a href="{{ route('dashboard.checkoutSingle' , ['id' => $produk->id]) }}" class="btn btn-info mt-2">
                        <i class="ri-send-plane-2-line"></i> Pesan</a>
                </div>

            </div>
            <div class="card-body">
                @php
                $like = rand(100 , 10000)
                @endphp
                <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i> {{
                    number_format($like) }}k
                </p>
                <h5 class="mb-1"><a href="#DetailProduk">{{ $produk->nama_produk }}</a></h5>
                <p class="text-muted mb-0">{{ $produk->kategori->nama_kategori }}</p>
            </div>
            <div class="card-footer border-top border-top-dashed">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 fs-14">
                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Harga : <span
                            class="fw-medium">Rp {{ number_format($produk->harga , 2) }}</span>
                    </div>
                    @php
                    $star= rand(1,5)
                    @endphp
                    <h5 class="flex-shrink-0 fs-14 text-primary mb-0"> <i class="ri-star-fill text-warning"> </i>{{
                        $star }}</h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>