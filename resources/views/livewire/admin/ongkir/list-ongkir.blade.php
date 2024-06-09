<div>
    {{-- @dd($provinsis['jawa_barat']['kota']['Bandung']['kecamatan']) --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">List Produk </h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3" wire:ignore>
                        <div class="col-sm-auto">
                            <div>
                                <button data-bs-toggle="modal" data-bs-target="#modalCreated"
                                    class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"
                                        wire:click='closeModal()' wire:ignore.self></i>
                                    Add</button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="customer_name">Provinsi</th>
                                    <th class="sort" data-sort="customer_name">Kota</th>
                                    <th class="sort" data-sort="gambar">Kecamatan</th>
                                    <th class="sort" data-sort="gambar">Metode</th>
                                    <th class="sort" data-sort="gambar">Biaya</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" wire:ignore.self>
                                @foreach ($ongkirs as $ongkir)
                                <tr>

                                    <td class="customer_name">{{ $ongkir->provinsi }}</td>
                                    <td class="customer_name">{{ $ongkir->kota }}</td>
                                    <td class="customer_name">{{ $ongkir->kecamatan }}</td>
                                    <td class="customer_name">{{ $ongkir->metode }}</td>

                                    <td class="customer_name">Rp {{ number_format($ongkir->harga , 2 , ',' , '.') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal" data-bs-target="#modalCreated"
                                                    wire:click="editKlik({{ $ongkir->id }})">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                    wire:click="remove({{ $ongkir->id }})">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <ul class="pagination listjs-pagination mb-0" wire:ignore.self></ul>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>


    {{-- MODALS --}}
    <div id="modalCreated" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: dblok;" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='closeModal()'> </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="Provinsi" class="form-label">Provinsi
                                        @error('provinsi')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" placeholder="Provinsi" id="Provinsi"
                                        wire:model='provinsi'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="Kota" class="form-label">Kota
                                        @error('kota')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" placeholder="Kota" id="Kota"
                                        wire:model='kota'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="Kecamatan" class="form-label">Kecamatan
                                        @error('kecamatan')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" placeholder="Kecamatan" id="Kecamatan"
                                        wire:model='kecamatan'>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="metode" class="form-label">Metode
                                        @error('metode')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" placeholder="Metode" id="metode"
                                        wire:model='metode'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga
                                        @error('harga')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="number" class="form-control" placeholder="Harga" id="harga"
                                        wire:model='harga'>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                        wire:click='closeModal()'>Close</button>
                    @if ($isUpdate == false)
                    <button type="button" class="btn btn-success" wire:click='create()' wire:loading.attr='disabled'
                        data-bs-dismiss="modal">Create</button>
                    @elseif($isUpdate == true)
                    <button type="button" class="btn btn-info" wire:loading.attr='disabled' data-bs-dismiss="modal"
                        wire:click='update()'>Update</button>
                    @endif
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>