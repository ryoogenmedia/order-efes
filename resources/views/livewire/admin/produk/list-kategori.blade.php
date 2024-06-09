<div class="card">

    <div class="accordion accordion-flush filter-accordion">

        <div class="card-body border-bottom">
            <div>
                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Kategori</p>
                <ul class="list-unstyled mb-0 filter-list">
                    @foreach ($kategoris as $kategori)
                    <li>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="kategori_id" id="id_{{ $kategori->id }}"
                                wire:change="changeId({{ $kategori->id }})">
                            <label class="form-check-label" for="id_{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end card -->