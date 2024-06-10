<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Pesanan #{{ $transaksi->kode_transaksi }}</h5>
                    <div class="flex-shrink-0">
                        <a href="apps-invoices-details.html" class="btn btn-success btn-sm"><i
                                class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                    </div>
                </div>
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
                                    <a href="{{ asset(Storage::url($detail->file)) }}" class="btn btn-outline-primary"
                                        target="blank">View</a>
                                    <a href="{{route('admin.download' , [ 'path' => 'pesanan','filename' => basename($detail->file)])}}"
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
                                            {{-- <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">

                                                </td>
                                            </tr> --}}
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row">Total (IDR) :</th>
                                                <th class="text-end">
                                                    @php
                                                    $total = 0;
                                                    foreach ($transaksi->detailTransaksi as $detail ){

                                                    $subTotal = $detail->produk->harga * $detail->jml_pesanan ;
                                                    $total += $subTotal ;
                                                    }
                                                    @endphp
                                                    Rp {{ number_format($total , 2, ',' ,'.') }}
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
    <!--end col-->
    <div class="col-md-6">
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
                                <h6 class="fs-14 mb-1">{{ $transaksi->user->nama }}</h6>
                                <p class="text-muted mb-0">Customer</p>
                            </div>
                        </div>
                    </li>
                    <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $transaksi->user->email}}</li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $transaksi->user->telp }}
                    </li>
                </ul>
            </div>
        </div>
        <!--end card-->
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Alamat
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li>{{ $transaksi->user->provinsi }}</li>
                    <li>{{ $transaksi->user->kota }}</li>
                    <li>{{ $transaksi->user->kecamatan }}</li>
                    <li>{{ $transaksi->user->alamat }}</li>
                </ul>
            </div>
        </div>
        <!--end card-->
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping
                    Address</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14">Joseph Parker</li>
                    <li>+(256) 245451 451</li>
                    <li>2186 Joyce Street Rocky Mount</li>
                    <li>California - 24567</li>
                    <li>United States</li>
                </ul>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>
                    Payment
                    Details</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Transactions:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">#VLZ124561278124</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Payment Method:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Debit Card</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Holder Name:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">Joseph Parker</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Card Number:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Total Amount:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0">$415.96</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>