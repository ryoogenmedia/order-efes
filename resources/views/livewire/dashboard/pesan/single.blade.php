<div class="row mb-3">
    @foreach ($keranjangs as $keranjang )
    <div class="col-12">


        <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                            <img src="{{ asset(Storage::url($keranjang->produk->gambar)) }}" alt=""
                                class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">{{
                                $keranjang->produk->nama_produk }}</a></h5>
                        <ul class="list-inline text-muted">
                            <li class="list-inline-item">Kategori : <span class="fw-medium">{{
                                    $keranjang->produk->kategori->nama_kategori }}</span></li>
                        </ul>
                        <p>{{ $keranjang->produk->keterangan }}</p>
                    </div>
                    <div class="col-sm-auto">
                        <div class="text-lg-end">
                            <p class="text-muted mb-1">Harga :</p>
                            <h5 class="fs-14">Rp <span id="ticket_price" class="product-price">{{
                                    number_format($keranjang->produk->harga , 2 , ',' , '.') }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-footer">
                <div class="row gy-3">
                    <div class="col-sm">
                        <div class="float-start">
                            <div>
                                <button class="d-block text-light btn btn-danger p-1 px-2 "
                                    wire:click="delete('{{ $keranjang->id }}')"><i
                                        class="ri-delete-bin-fill  align-bottom me-1"></i> Hapus </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="float-end">
                            <div>
                                <a href="{{ route('dashboard.checkoutSingle' , ['id' => $keranjang->produk->id]) }}"
                                    class="d-block text-light btn btn-primary p-1 px-2 "><i
                                        class="ri-send-plane-2-line  align-bottom me-1"></i> Pesan Sekarang </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
        <!-- end card -->

    </div>
    @endforeach

</div>