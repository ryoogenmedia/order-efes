<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($isUpdate == false)

                <form wire:submit='save()'>
                    @elseif ($isUpdate == true)
                    <form wire:submit='update()'>
                        @endif

                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="namProduk" class="form-label">Nama Produk
                                    @error('nama_produk')
                                    <code>{{ $message }}</code>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="namProduk" placeholder="Nama Produk"
                                    wire:model='nama_produk'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="cleave-numerals" class="form-label">Harga
                                    @error('harga')
                                    <code>{{ $message }}</code>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" placeholder="Harga Produk"
                                    id="cleave-numerals" wire:model='harga' wire:ignore.self>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="fileUplaod" class="form-label">Gambar
                                    @error('gambar')
                                    <code>{{ $message }}</code>
                                    @enderror
                                </label>
                            </div>
                            @if ($isUpdate == false)
                            <div class="col-lg-9">
                                <input type="file" class="form-control" id="fileUplaod" wire:model='gambar'>
                            </div>
                            @elseif ($isUpdate == true)
                            <div class="col-lg-9">
                                <input type="file" class="form-control" id="fileUplaod" wire:model='fileUpdate'>
                            </div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="katgeori" class="form-label">Kategori
                                    @error('kategori_id')
                                    <code>{{ $message }}</code>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-select " aria-label="Default select example"
                                    wire:model='kategori_id'>
                                    <option selected>Open this select menu</option>
                                    @foreach ($kategoris as $kategori )
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="keterangan" class="form-label">Keterangan
                                    @error('keterangan')
                                    <code>{{ $message }}</code>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" id="keterangan" rows="3"
                                    placeholder="Input Keterangan Produk" wire:model='keterangan'></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            @if ($isUpdate == false)
                            <button type="submit" class="btn btn-primary" wire:loading.class='d-none'>Tambah
                                Produk</button>
                            @elseif($isUpdate == true)
                            <button type="submit" class="btn btn-danger" wire:loading.class='d-none' class="btn-close"
                                data-bs-dismiss="modal">Update
                                Produk</button>
                            @endif
                            <button type="button" class="btn btn-primary btn-load" wire:loading disabled>
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </span>
                                    <span class="flex-grow-1 ms-2">
                                        Loading...
                                    </span>
                                </span>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>