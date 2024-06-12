<div>

    <div class="card">
        <div class="card-header border-0">
            <div class="row g-4">
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control" id="searchProductList"
                                placeholder="Search Products..." wire:model.live.debounce='search'>
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end card header -->
        <div class="card-body">

            @if ($produks->count() != 0)
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                            <th class="sort" data-sort="gambar">Gambar</th>
                            <th class="sort" data-sort="customer_name">Nama Produk</th>
                            <th class="sort" data-sort="customer_name">Harga</th>
                            <th class="sort" data-sort="action"></th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all" wire:ignore.self>

                        @foreach ($produks as $produk)
                        <tr>
                            <td class="gambar">
                                <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <div class="avatar-xl text-center">
                                        <img src="{{ asset(Storage::url($produk->gambar)) }}" class="img-fluid"
                                            alt="Responsive image">
                                    </div>
                                </div>
                            </td>
                            <td class="customer_name ">
                                <div class="h5">
                                    {{ $produk->nama_produk }}
                                </div>
                                <span class="badge badge-label bg-info"><i class="mdi mdi-circle-medium"></i>
                                    {{ $produk->kategori->nama_kategori }}</span>
                            </td>
                            <td class="customer_name">Rp {{ number_format($produk->harga , 2 , ',' , '.') }}
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                            data-bs-target="#addToCart"
                                            wire:click="$set('produk_id' , {{ $produk->id }})"
                                            wire:loading.attr='disabled'>Detail</button>
                                    </div>
                                    <div class=" remove">
                                        <button class="btn btn-sm btn-warning remove-item-btn"
                                            wire:click="tambahKeranjang('{{ $produk->id }}')"
                                            wire:loading.attr='disabled'>
                                            <i class="ri-shopping-cart-2-line"></i>
                                            Tambah Ke Keranjang
                                        </button>
                                    </div>
                                    <div class=" remove">
                                        <a href="{{ route('dashboard.pesan' , ['id' => $produk->id]) }}"
                                            class="btn btn-sm btn-primary remove-item-btn"> <i
                                                class="ri-send-plane-2-line"></i>
                                            Pesan Sekarang</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>


            </div>
            @else

            <div class="noresult" wire:ignore.self>
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                    </lord-icon>
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">We've searched more than Orders We did not find
                        any
                        orders for you search.</p>
                </div>
            </div>
            @endif
            <div class="d-flex justify-content-start">
                <span class="ml-4 ">Show {{ $produks->perPage() }} of {{ $produks->total() }}</span>
            </div>
            <div class="d-flex justify-content-end" wire:ignore.self>
                <div class="btn-group gap-2">
                    <button class="btn btn-outline-primary btn-sm" wire:click='previous()'>
                        Previous
                    </button>
                    <button class="btn btn-outline-primary btn-sm">
                        {{ $produks->currentPage() }}
                    </button>
                    <button class="btn btn-outline-primary btn-sm" wire:click="next('{{ $produks->lastPage() }}')">
                        Next
                    </button>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->

    {{-- MODAL TO CART --}}
    <!-- Default Modals -->
    @if ($produkSelected != null)

    <div id="addToCart" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">{{ $produkSelected->nama_produk }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <h5 class="fs-15">
                        Keterangan
                    </h5>
                    <p class="text-wrap text-muted">
                        {{ $produkSelected->keterangan }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('dashboard.pesan' , ['id' => $produkSelected->id]) }}"
                        class="btn btn-primary ">Pesan Sekarang</a>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif
</div>