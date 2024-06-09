<div>
    <section class="section bg-light" id="{{ config('navbar.produk.url') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h2 class="mb-3 fw-semibold lh-base">PRODUK</h2>
                        <p class="text-muted mb-4">Silahkan ajukan pertanyaan seputar Ruangprint dan kami akan merespon
                            setiap pertanyaan dari Anda dan pihak lainnya
                            sesegera mungkin.</p>
                        <ul class="nav nav-pills filter-btns justify-content-center" role="tablist">
                            @foreach ($kategoris->all() as $kategori )
                            <li class="nav-item" role="presentation" wire:click="changeKategoriId({{ $kategori->id }})">
                                <button class="nav-link fw-medium {{ $kategori->id == $kategoriId ? 'active' : '' }}"
                                    type="button" data-filter="{{ $kategori->id }}">{{
                                    $kategori->nama_kategori }}</button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row">
                @foreach ($kategoris->all() as $kategori )
                @foreach ($produks->where('kategori_id' , $kategori->id)->paginate(3) as $produk )
                <div
                    class="col-lg-4 product-item {{ $produk->kategori_id }} {{ $kategoriId == $produk->kategori_id ? 'active' : 'd-none' }}">
                    <div class=" card explore-box card-animate">
                        <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                            <button type="button" class="btn btn-icon " data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                        </div>
                        <div class="explore-place-bid-img">
                            <img src="{{ Storage::url($produk->gambar)}}" alt="" class="card-img-top explore-img" />
                            <div class="bg-overlay"></div>
                            <div class="place-bid-btn">
                                <a href="#!" class="btn btn-success"><i class=" align-bottom me-1"></i>See More</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                15.93k </p>
                            <h5 class="mb-1"><a href="apps-nft-item-details.html">{{ $produk->nama_produk}}</a></h5>
                            <p class="text-muted mb-0">{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                        <div class="card-footer border-top border-top-dashed">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 fs-14">
                                    <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Harga:
                                    <span class="fw-medium">Rp {{ number_format($produk->harga, 2, ',', '.') }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach

            </div>
        </div><!-- end container -->
    </section>
</div>