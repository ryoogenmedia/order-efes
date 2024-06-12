<div class="row justify-content-center">
    <div class="col-xxl-9">

        <div class="card" id="demo">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header border-bottom-dashed p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" class="card-logo card-logo-dark"
                                    alt="logo dark" height="17">
                                <img src="{{ asset('assets/images/logo-light.png') }}" class="card-logo card-logo-light"
                                    alt="logo light" height="17">
                                <div class="mt-sm-5 mt-4">
                                    <h6 class="text-muted text-uppercase fw-semibold">Alamat</h6>
                                    <p class="text-muted mb-1" id="address-details">{{ $kontak->alamat }}</p>
                                </div>
                                <div class="mt-sm-3 mt-2">
                                    <h6 class="text-muted text-uppercase fw-semibold">Receipt Info</h6>
                                    <p class="text-muted mb-1" id="address-details">{{ $transaksi->resi }}</p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Email: </span><span id="email">{{ $kontak->email
                                        }}</span></h6>
                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span
                                        id="contact-no">{{ $kontak->tlp }}</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Kode Transaksi</p>
                                <h5 class="fs-14 mb-0">#VL<span id="invoice-no">{{ $transaksi->kode_transaksi }}</span>
                                </h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Tanggal Pemesanan</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-date">{{
                                        $transaksi->created_at->format('d M, Y') }}</span> <small class="text-muted"
                                        id="invoice-time">{{ $transaksi->created_at->format('H:i') }}</small></h5>
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Status</p>
                                <span class="badge bg-info-subtle text-info fs-11 text-uppercase" id="payment-status">{{
                                    $transaksi->status }}</span>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Total Pembayaran</p>
                                <h5 class="fs-14 mb-0">Rp <span id="total-amount">{{ number_format($transaksi->total , 2
                                        , ',' , '.') }}</span></h5>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4 border-top border-top-dashed text-capitalize">
                        <div class="row g-3">
                            <div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Informasi Penerima</h6>
                                <p class="fw-medium mb-2 text-capitalize" id="billing-name">{{ Auth::user()->nama }}</p>
                                <p class="text-muted mb-1 text-capitalize" id="billing-address-line-1">Provinsi : {{
                                    Auth::user()->provinsi }}</p>
                                <p class="text-muted mb-1 text-capitalize" id="billing-address-line-1">kota : {{
                                    Auth::user()->kota }}
                                </p>
                                <p class="text-muted mb-1" id="billing-address-line-1">kecamatan : {{
                                    Auth::user()->kecamatan }}</p>
                                <p class="text-muted mb-1"><span>Phone: </span><span id="billing-phone-no">{{
                                        Auth::user()->telp }}</span></p>
                                <p class="text-muted mb-0"><span>Email: </span><span id="billing-tax-no">{{
                                        Auth::user()->email }}</span>
                                </p>
                            </div>
                            <!--end col-->
                            <div class="col-6 ">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Informasi Jasa Pengiriman</h6>
                                <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                <p class="text-muted text-capitalize mb-1" id="shipping-address-line-1">Provinsi : {{
                                    $transaksi->ongkir->provinsi }}</p>
                                <p class="text-muted text-capitalize mb-1" id="shipping-address-line-1">kota : {{
                                    $transaksi->ongkir->kota }}</p>
                                <p class="text-muted text-capitalize mb-1" id="shipping-address-line-1">kecamatan : {{
                                    $transaksi->ongkir->kecamatan }}</p>
                                <p class="text-muted text-capitalize mb-1"><span>Alamat Tujuan : </span><span
                                        id="shipping-phone-no">{{
                                        $transaksi->alamat }}</span></p>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table
                                class="table table-borderless text-center table-nowrap align-middle mb-0 text-capitalize">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col">Produk</th>
                                        <th scope="col">Produk Detail</th>
                                        <th scope="col">harga</th>
                                        <th scope="col">jumlah</th>
                                        <th scope="col" class="text-end">total</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">
                                    @foreach ($transaksi->detailTransaksi as $detail )

                                    <tr>
                                        <td class="gambar">
                                            <div class="d-flex justify-content-center align-items-center"
                                                style="height: 100%;">
                                                <div class="avatar-xl text-center">
                                                    <img src="{{ asset(Storage::url($detail->produk->gambar)) }}"
                                                        class="img-fluid" alt="Responsive image">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-start">
                                            <span class="fw-bold  fs-20">{{ $detail->produk->nama_produk }}</span>
                                            <p class="fw-medium">{{ $detail->produk->kategori->nama_kategori
                                                }}</p>
                                            <p class="text-muted mb-0">{{ $detail->produk->keterangan }}</p>
                                        </td>
                                        <td>Rp {{ number_format($detail->produk->harga , 2 , ',' , '.')}}</td>
                                        <td>{{ $detail->jml_pesanan }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->produk->harga *
                                            $detail->jml_pesanan , 2 , ',' ,
                                            '.')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                style="width:250px">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end">Rp {{ number_format($detail->produk->harga *
                                            $detail->jml_pesanan , 2 , ',' ,
                                            '.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Ongkir</td>
                                        <td class="text-end">{{ number_format($transaksi->ongkir->harga , 2 , ',' , '.')
                                            }}</td>
                                    </tr>
                                    <tr class="border-top border-top-dashed fs-15">
                                        <th scope="row">Total Pembayaran</th>
                                        <th class="text-end">Rp {{ number_format($transaksi->total , 2) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="mt-3">
                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Informasi Pembayaran:</h6>
                            <p class="text-muted mb-1">Nama Bank: <span class="fw-medium" id="payment-method">{{
                                    $transaksi->informasiPembayaran->nama_bank }}</span></p>
                            <p class="text-muted mb-1">Nama Akun: <span class="fw-medium" id="payment-method">{{
                                    $transaksi->informasiPembayaran->nama_akun }}</span></p>
                            <p class="text-muted mb-1">No Rek.: <span class="fw-medium" id="payment-method">{{
                                    $transaksi->informasiPembayaran->no_rek }}</span></p>
                        </div>
                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                            <a href="{{ asset(Storage::url($transaksi->bukti_kirim)) }}" target="__blank"
                                class="btn btn-info">View
                                File</a>
                            <a href="{{route('admin.download' , [ 'path' => 'buktiPengiriman','filename' => basename($transaksi->bukti_kirim)])}}"
                                class="btn btn-info"><i class="ri-download-2-line align-bottom me-1"></i> Download
                                File</a>
                            <button data-bs-toggle="modal" data-bs-target="#modalTestimoni" class="btn btn-success">
                                Konfirmasi
                                Penerimaan</button>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-->
        <div id="modalTestimoni" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Testimoni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" cols="30" rows="10"
                            placeholder="Berikan Tanggapan Anda Mengenai Layanan Kami"
                            wire:model='testimoni'></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary " wire:click='konfirmasi()'>Konfirmasi</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!--end col-->
    <!-- Default Modals -->

</div>