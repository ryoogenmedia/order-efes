<div class="card">

    <div class="accordion accordion-flush filter-accordion">

        <div class="card-body border-bottom">
            <div>
                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Kategori</p>
                <ul class="list-unstyled mb-0 filter-list">
                    @foreach ($kategoris as $kategori)
                    <li>
                        <a href="#" class="d-flex py-1 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0 listname">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="kategori_id"
                                            id="id_{{ $kategori->id }}" wire:change="changeId({{ $kategori->id }})">
                                        <label class="form-check-label" for="id_{{ $kategori->id }}">
                                            {{ $kategori->nama_kategori }}
                                        </label>
                                    </div>
                                </h5>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <span class="badge bg-light text-info">{{ $kategori->produk()->count() }}</span>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <div class="remove">
                                    <button class="btn btn-sm btn-primary remove-item-btn"
                                        wire:click="editKategori({{ $kategori->id }})" title="Edit"
                                        wire:loading.class='d-none'><i class="ri-edit-box-line"></i></button>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <div class="remove">
                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                        wire:click="deleteKategori({{ $kategori->id }})" title="remove"
                                        wire:loading.class='d-none'><i class="ri-delete-bin-7-line"></i></button>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-footer">
            <div class="row mt-2 gap-2">
                @error('nama_kategori')
                <div class="col-12">
                    <code>{{ $message }}</code>
                </div>
                @enderror
                <div class="col-12">
                    <input type="text" class="form-control" id="fileUplaod" wire:model='nama_kategori'>
                </div>

                @if ($isUpdate == true)
                <div class="col-12">
                    <button type="submit" class="btn btn-warning" wire:loading.class='d-none'
                        wire:click='updateKategori()'>Update
                        Kategori</button>
                </div>
                @else
                <div class="col-12">
                    <button type="submit" class="btn btn-info" wire:loading.class='d-none'
                        wire:click='newKategori()'>Tambah
                        Kategori</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- end card -->