<div class="row mb-3">
    <div class="col-xl-8">

        <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                            <img src="{{ asset(Storage::url($produk->gambar)) }}" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">{{
                                $produk->nama_produk }}</a></h5>
                        <ul class="list-inline text-muted">
                            <li class="list-inline-item">Kategori : <span class="fw-medium">{{
                                    $produk->kategori->nama_kategori }}</span></li>
                        </ul>

                        <div class="input-step">
                            <button type="button" class="minus shadow" wire:click='kurangiJmlPesan()'>–</button>
                            <input type="number" class="" wire:model.live='jml_pesan'>
                            <button type="button" class="plus shadow" wire:click='tambahJmlPesan()'>+</button>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="text-lg-end">
                            <p class="text-muted mb-1">Harga :</p>
                            <h5 class="fs-14">Rp <span id="ticket_price" class="product-price">{{
                                    number_format($produk->harga , 2 , ',' , '.') }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-footer">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <div class="d-flex flex-wrap my-n1">
                            <div>
                                <a href="{{ route('dashboard.index') }}"
                                    class="d-block text-light btn btn-danger p-1 px-2 "><i
                                        class="ri-delete-bin-fill  align-bottom me-1"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <div>Total :</div>
                            <h5 class="fs-14 mb-0">Rp
                                <span class="product-line-price">
                                    {{ number_format($produk->harga * $jml_pesan , 2 , ',' ,'.')}}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card footer -->
        </div>
        <!-- end card -->

        {{-- <div class="card product">
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-sm-12">
                        <div class="mb-0">
                            <label for="billinginfo-firstName" class="form-label">File
                                @error('file')
                                <code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input type="file" class="form-control" wire:model='file'>
                            <span class="text-info text-capitalize"># NOTE : Silahkan kirim gambar sketsa sebagai
                                ilustrasi design</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-1">
                            <label for="billinginfo-firstName" class="form-label">Catatan
                                @error('catatan')
                                <code>{{ $message }}</code>
                                @enderror
                            </label>
                            <textarea class="form-control" id="VertimeassageInput" rows="5"
                                placeholder="Catatan (optional)" wire:model='catatan'></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card --> --}}


    </div>


    <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Total Sementara</h5>
                </div>

                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Total Pesanan :</td>
                                    <td class="text-end">{{ $jml_pesan }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Produk :</td>
                                    <td class="text-end">Rp {{ number_format($produk->harga , 2 , ',' ,'.') }}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Total (IDR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold" id="cart-total">
                                            Rp {{ number_format($produk->harga * $jml_pesan , 2 , ',' ,'.')}}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
            <div class="text-end mb-4">
                <button class="btn btn-success btn-label right ms-auto" wire:loading.attr='disabled'
                    wire:click='checkout()'><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                    Checkout</button>
            </div>
        </div>
        <!-- end stickey -->


    </div>



</div>