<div class="row d-flex align-items-stretch flex-wrap">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Pesanan #{{ $transaksi->kode_transaksi }}
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
                        <span class="badge badge-label bg-{{ $color }}"><i class="mdi mdi-circle-medium"></i> {{
                            $transaksi->status }}</span>
                    </h5>
                    @if ($transaksi->status == 'menunggu konfirmasi')

                    <div class="flex-shrink-0" wire:ignore.self>
                        <button class="btn btn-warning btn-sm" wire:click='updateStatus()'><i
                                class="ri-check-fill align-middle me-1"></i>
                            Konfirmasi</button>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Detail Pesanan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Pesanan</th>
                                <th scope="col">Desain</th>
                                <th scope="col" class="text-end">Total </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->detailTransaksi as $detail )

                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="{{ asset(Storage::url($detail->produk->gambar)) }}"
                                                alt="{{ $detail->produk->nama_produk }}" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fs-15"><a href="" class="link-primary">{{
                                                    $detail->produk->nama_produk }}</a></h5>
                                            <p class="text-muted mb-0">Kategori:<span
                                                    class="badge badge-label bg-primary"><i
                                                        class="mdi mdi-circle-medium"></i> {{
                                                    $detail->produk->kategori->nama_kategori }}</span>
                                            </p>
                                            <p class="text-muted mb-0 text-wrap text"><b>Catatan:</b> <br> <span>{{
                                                    $detail->catatan
                                                    }}</span>
                                            </p>

                                        </div>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($detail->produk->harga ,2 , ',' ,'.') }}</td>
                                <td class="text-center">{{ $detail->jml_pesanan }}</td>
                                <td class="btn-group gap-2">
                                    <a href="{{ asset(Storage::url($detail->desain)) }}" class="btn btn-outline-primary"
                                        target="blank">View</a>
                                    <a href="{{route('admin.download' , [ 'path' => 'desain','filename' => basename($detail->desain)])}}"
                                        class="btn btn-outline-primary"><i class="ri-download-cloud-2-line"></i>
                                        Download</a>
                                </td>
                                <td class="fw-medium text-end">
                                    Rp {{ number_format($detail->jml_pesanan * $detail->produk->harga , 2 , ',', '.') }}
                                </td>
                            </tr>

                            @endforeach

                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">
                                                    @php
                                                    $total = 0;
                                                    foreach ($transaksi->detailTransaksi as $detail ){

                                                    $subTotal = $detail->produk->harga * $detail->jml_pesanan ;
                                                    $total += $subTotal ;
                                                    }
                                                    @endphp
                                                    Rp {{ number_format($total , 2, ',' ,'.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Ongkir :</td>
                                                <td class="text-end">
                                                    Rp {{ number_format($transaksi->ongkir->harga , 2, ',' ,'.') }}
                                                </td>
                                            </tr>
                                            <tr class="border-top border-top-dashed">

                                                <th scope="row">Total Pembayaran (IDR) :</th>
                                                <th class="text-end">
                                                    Rp {{ number_format((($transaksi->total)) , 2 , ','
                                                    ,
                                                    '.')}}
                                                </th>
                                            </tr>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($transaksi->status == 'pembuatan')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-caravan-line align-middle me-1 text-muted"></i>Bukti Pengiriman
                </h5>

            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-3">
                    <label for="" class="form-label">No Resi Pengiriman
                        @error('resi')
                        <code>{{ $message }}</code>
                        @enderror
                    </label>
                    <li class="btn-group gap-2">
                        <input type="text" id="noResi" class="form-control" placeholder="No Resi Pengiriman"
                            wire:model.live='resi'>
                    </li>

                    <label for="" class="form-label">File
                        @error('file')
                        <code>{{ $message }}</code>
                        @enderror
                    </label>
                    <li class="btn-group gap-2">
                        <input type="file" id="fileJadi" class="form-control" placeholder="File Pesanan"
                            wire:model.live='file'>
                    </li>

                    <li>
                        <div class="btn-group">
                            <button class="btn-primary btn" wire:loading.attr='disabled'
                                wire:click='konfirmasi()'>Konfirmasi</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--end card-->
    </div>
    @endif
    <!--end col-->
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">User Details</h5>
                    <div class="flex-shrink-0">
                        {{-- <a href="javascript:void(0);" class="link-secondary">View Profile</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset(Storage::url($transaksi->user->foto)) }}" alt="foto user"
                                    class="avatar-sm rounded-circle shadow">

                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1 text-capitalize">{{ $transaksi->user->nama }}</h6>
                                <p class="text-muted mb-0">Customer</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $transaksi->user->email}}</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $transaksi->user->telp }}
                    </li>
                    <li>Tanggal Daftar : {{ $transaksi->user->created_at->format('d M, Y') }}
                    </li>
                </ul>
            </div>
        </div>
        <!--end card-->
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>Informasi
                    Pembayaran</h5>
            </div>
            <div class="card-body">

                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Bank:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $transaksi->informasiPembayaran->nama_bank }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Nama Akun:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $transaksi->informasiPembayaran->nama_akun }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">No. Rek:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">{{ $transaksi->informasiPembayaran->no_rek }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Status:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0 text-uppercase">{{ $transaksi->informasiPembayaran->status }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Bukti Pembayaran:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <td class="btn-group gap-2">
                            <a href="{{ asset(Storage::url($transaksi->informasiPembayaran->file_bukti)) }}"
                                class="btn btn-outline-primary" target="blank">View</a>
                            <a href="{{route('admin.download' , [ 'path' => 'buktiPembayaran','filename' => basename($transaksi->informasiPembayaran->file_bukti)])}}"
                                class="btn btn-outline-primary"><i class="ri-download-cloud-2-line"></i>
                                Download</a>
                        </td>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Alamat
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">

                    <li class="text-capitalize">Provinsi : {{ $transaksi->user->provinsi }}</li>
                    <li class="text-capitalize">Kota : {{ $transaksi->user->kota }}</li>
                    <li class="text-capitalize">Kecamatan : {{ $transaksi->user->kecamatan }}</li>
                    <li class="text-capitalize">Alamat : {{ $transaksi->alamat }}</li>

                </ul>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Informasi
                    Pengiriman
                </h5>

            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="text-capitalize"> <b>Metode Pengiriman</b> {{ $transaksi->ongkir->metode }}</li>
                    <li class="text-capitalize"> <b>Provinsi</b> {{ $transaksi->ongkir->provinsi }}</li>
                    <li class="text-capitalize"> <b>Kota</b> {{ $transaksi->ongkir->kota }}</li>
                    <li class="text-capitalize"> <b>Kecamatan</b> {{ $transaksi->ongkir->kecamatan }}</li>
                </ul>



            </div>
        </div>
        <!--end card-->
    </div>

</div>