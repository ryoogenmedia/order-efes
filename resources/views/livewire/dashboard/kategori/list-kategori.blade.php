{{-- <div class="card">
    <div class="card-header">
        <div class="d-flex mb-3">
            <div class="flex-grow-1">
                <h5 class="fs-16">Filters</h5>
            </div>
            <div class="flex-shrink-0">
                <span class="text-decoration-underline cursor-pointer text-info" wire:click='filterClear()'>Clear
                    All</span>
            </div>
        </div>

    </div>

    <div class="accordion accordion-flush filter-accordion">

        <div class="card-body border-bottom">
            <div>
                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Kategori </p>
                <ul class="list-unstyled mb-0 filter-list">
                    @foreach ($kategoris as $kategori )

                    <li>
                        <span class="d-flex py-1 align-items-center cursor-pointer"
                            wire:click="idChange({{ $kategori->id }})">
                            <div class="flex-grow-1">
                                @php
                                $color = '' ;
                                if ($kategori->id == $kategori_id) {
                                $color = 'text-info' ;
                                }
                                @endphp
                                <h5 class="fs-13 mb-0 listname {{ $color }} ">{{ $kategori->nama_kategori }}</h5>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <span class="badge bg-light text-muted">{{ $kategori->produk->count() }}</span>
                            </div>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<div>
    <div class="row">
        <div class="col-12">

            <div class="form-group text-center text-wrap  ">
                @php

                if ($kategori_id !== null){
                $all = '-outline' ;
                } else {
                $all = '' ;
                }

                @endphp
                <button class="btn btn{{ $all }}-info btn-sm" wire:click='filterClear()'>ALL</button>
                @foreach ($kategoris as $kategori )
                @php
                $color = '-outline' ;
                if ($kategori->id == $kategori_id) {
                $color = '' ;
                }
                @endphp
                <button class="btn btn{{ $color }}-info btn-sm text-capitalize"
                    wire:click="idChange({{ $kategori->id }})">{{
                    $kategori->nama_kategori }}</button>
                @endforeach
            </div>
        </div>
    </div>

</div>