<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">Pesanan</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            <button type="button" class="btn btn-info"><i
                                    class="ri-file-download-line align-bottom me-1"></i> Import</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="search-box float-end">
                                <input type="text" class="form-control search" placeholder="Search Kode Transaksi"
                                    wire:model.live.debounce='search'>
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <div class="card-body pt-2">
                <div>

                    <div class="table-responsive table-card mb-1">

                        <table class="table table-nowrap align-middle" id="">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th data-sort="id">Kode </th>
                                    <th data-sort="product_name">Metode Pengiriman</th>
                                    <th data-sort="date">Tanggal</th>
                                    <th data-sort="amount">Total Pembayaran</th>
                                    <th data-sort="status">Status Pesanan</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" wire:ignore.self>
                                @foreach ($transaksis as $transaksi)

                                <tr>

                                    <td class="id"><span class="fw-medium link-primary">{{ $transaksi->kode_transaksi
                                            }}</span></td>
                                    <td class="product_name">
                                        <div class="text-center">
                                            {{ $transaksi->ongkir->metode }}
                                        </div>
                                    </td>
                                    <td class="date">{{ $transaksi->created_at->format('d M, Y') }}<small
                                            class="text-muted "> {{ $transaksi->created_at->format(' h:i') }}</small>
                                    </td>
                                    <td class="amount text-center">Rp {{ number_format($transaksi->total, 2,'.', ',')}}
                                    </td>
                                    @php
                                    $color = '' ;
                                    switch ($transaksi->status) {
                                    case 'sukses':
                                    $color = 'success' ;
                                    break;
                                    case 'menunggu konfirmasi':
                                    $color = 'warning' ;
                                    break;
                                    case 'menunggu pembayaran':
                                    $color = 'info' ;
                                    break;
                                    case 'dibatalkan':
                                    $color = 'danger' ;
                                    break;
                                    case 'pengiriman':
                                    $color = 'info' ;
                                    break;
                                    case 'pembuatan':
                                    $color = 'info' ;
                                    break;

                                    default:
                                    $color = 'muted' ;
                                    break;
                                    }
                                    @endphp


                                    @if ($transaksi->status == 'pengiriman' || $transaksi->status == 'sukses')
                                    <td>
                                        <span
                                            class=" text-capitalize btn btn-outline-{{ $color }} btn-label waves-effect right waves-light ">{{
                                            $transaksi->status }} </span>

                                        <a href="{{ route('dashboard.detailPesanan' , ['id' => $transaksi->id])}}"
                                            class="btn btn-outline-info btn-label waves-effect right waves-light "
                                            wire:loading.attr='disabled'><i
                                                class=" ri-caravan-line label-icon align-middle  fs-16 ms-2"></i>Lihat
                                            Detail</a>
                                    </td>
                                    @else
                                    <td class="status"><span
                                            class="badge bg-{{ $color }}-subtle text-{{ $color }} text-uppercase">{{
                                            $transaksi->status }}</span>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->