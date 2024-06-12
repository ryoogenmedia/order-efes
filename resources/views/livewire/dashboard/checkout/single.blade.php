<div class="row">
    <div class="col-xl-7" wire:ignore.self>
        <div class="card">
            <div class="card-body checkout-tab">

                <form action="#">
                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3" wire:ignore.self>
                        <ul class="nav nav-pills nav-justified custom-nav d-none" role="tablist">
                            <li class="nav-item" role="presentation" wire:click="$set('step.2' , true)">
                                <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bill-info" type="button" role="tab"
                                    aria-controls="pills-bill-info" aria-selected="true">
                                    <i
                                        class="ri-user-2-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Pesanan
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-payment" type="button" role="tab"
                                    aria-controls="pills-payment" aria-selected="false">
                                    <i
                                        class="ri-bank-card-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Pembayaran
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-finish-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-finish" type="button" role="tab" aria-controls="pills-finish"
                                    aria-selected="false">
                                    <i
                                        class="ri-checkbox-circle-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Finish

                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        @if ($isFinish == false)

                        <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                            aria-labelledby="pills-bill-info-tab" wire:ignore.self>
                            <div>
                                <h5 class="mb-1">Informasi Pesanan</h5>
                                <p class="text-muted mb-4"></p>
                            </div>

                            <div>
                                <div class="col-sm-12">
                                    <div class="mb-0">
                                        <label for="billinginfo-firstName" class="form-label">File
                                            @error('file')
                                            <code>{{ $message }}</code>
                                            @enderror
                                        </label>
                                        <input type="file" class="form-control" wire:model='file'>
                                        <span class="text-info text-capitalize"># NOTE : Silahkan kirim gambar sketsa
                                            sebagai
                                            ilustrasi design</span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-1">
                                        <label for="billinginfo-firstName" class="form-label">Catatan
                                            @error('catatan')
                                            <code>{{ $message }}</code>
                                            @enderror
                                        </label>
                                        <textarea class="form-control" id="VertimeassageInput" rows="5"
                                            placeholder="Catatan (optional)" wire:model='catatan'></textarea>
                                    </div>
                                </div>

                                <div>
                                    <h5 class="mt-4">Informasi Pengiriman</h5>
                                    <p class="text-muted mb-4"></p>
                                </div>
                                <div class="mt-4">
                                    <div class="row gy-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Provinsi</label>
                                            <select id="inputState" class="form-select" wire:model.live='provinsi'>
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($ongkirs->get() as $ongkir )
                                                <option value="{{ $ongkir->provinsi }}">{{ $ongkir->provinsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Provinsi</label>
                                            <select id="inputState" class="form-select" wire:model.live='kota'>
                                                <option selected>Pilih Kota</option>
                                                @foreach ($ongkirs->where('provinsi' , 'like' ,
                                                '%'.$provinsi.'%')->get() as $ongkir )
                                                <option value="{{ $ongkir->kota }}">{{ $ongkir->kota }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Kecamatan</label>
                                            <select id="inputState" class="form-select" wire:model.live='kecamatan'>
                                                <option selected>Pilih Kecamatan</option>
                                                @foreach ($ongkirs->where('kota' , 'like' ,
                                                '%'.$kota.'%')->get() as $ongkir )
                                                <option value="{{ $ongkir->kecamatan }}">{{ $ongkir->kecamatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Metode </label>
                                            <select id="inputState" class="form-select" wire:model.live='metode'>
                                                <option selected>Pilih Metode Pengiriman</option>
                                                @foreach ($ongkirs->where('provinsi' , 'like' ,
                                                '%'.$provinsi.'%')->get() as $ongkir )
                                                <option value="{{ $ongkir->metode }}">{{ $ongkir->metode }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="alamat" class="form-label">Alamat Lengkap </label>
                                            <textarea id="alamat" class="form-control" rows="3"
                                                placeholder="Alamat Lengkap" wire:model.live='alamat'></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="d-flex align-items-start gap-3 mt-3">

                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-payment-tab" @if (($file==null) || ($provinsi=='' ) ||
                                        ($kota=='' ) || ($kecamatan=='' || ($alamat=='' ))) disabled @endif>
                                        <i class="ri-truck-line label-icon align-middle fs-16 ms-2"></i>Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade " id="pills-payment" role="tabpanel"
                            aria-labelledby="pills-payment-tab" wire:ignore.self>
                            <div>
                                <h5 class="mb-1">Pembayaran</h5>
                                <p class="text-muted mb-4"> </p>
                            </div>

                            <div class="row g-4">
                                <div class="col-lg-4 col-sm-6">
                                    <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse"
                                        aria-expanded="true" aria-controls="paymentmethodCollapse">
                                        <div class="form-check card-radio">
                                            <input id="paymentMethod02" name="paymentMethod" type="radio"
                                                class="form-check-input" checked>
                                            <label class="form-check-label" for="paymentMethod02">
                                                <span class="fs-16 text-muted me-2"><i
                                                        class="ri-bank-card-fill align-bottom"></i></span>
                                                <span class="fs-14 text-wrap text-uppercase">{{ $kontak->bank }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="collapse show">
                                <div class="text-muted mt-2 fst-italic">
                                    <i class="text-muted icon-xs"></i> Silahkan Melakukan Pembayaran ke Bank dibawah ini
                                </div>
                                <div class="card p-4 border shadow-none mb-0 mt-4">
                                    <div class="row gy-3">
                                        <div class="col-md-4">
                                            <p for="cc-name" class="form-label">Bank</p>
                                            <button class="btn btn-outline-primary text-uppercase">{{ $kontak->bank
                                                }}</button>
                                        </div>
                                        <div class="col-md-4">
                                            <p for="cc-name" class="form-label">Nomor Rekening</p>
                                            <button class="btn btn-outline-primary">{{ $kontak->rek }}</button>
                                        </div>
                                        <div class="col-md-4">
                                            <p for="cc-name" class="form-label">Atas Nama</p>
                                            <button class="btn btn-outline-primary text-uppercase">{{ $kontak->atas_nama
                                                }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-muted mt-5 fst-italic">
                                    <i class="text-muted icon-xs"></i> Infromasi Bukti Pembayaran
                                </div>
                                <div class="card p-4 border shadow-none mb-0 mt-4">
                                    <div class="row gy-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Nama Bank
                                                @error('nama_bank')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </label>
                                            <input type="text" class="form-control" placeholder="Nama Bank"
                                                wire:model.live='nama_bank'>
                                            <small class="text-muted">Nama Bank Pengirim (BRI , BCA)</small>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Nama Akun
                                                @error('nama_akun')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </label>
                                            <input type="text" class="form-control" placeholder="Nama Akun"
                                                wire:model.live='nama_akun'>
                                            <small class="text-muted">Nama Akun Pemilik</small>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Nomor Rekening
                                                @error('no_rek')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </label>
                                            <input type="number" class="form-control" placeholder="Nomor Rekening"
                                                wire:model.live='no_rek'>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">File Bukti Pembayaran
                                                @error('file_bukti')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </label>
                                            <input type="file" class="form-control" wire:model.live='file_bukti'>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-light btn-label previestab"
                                    data-previous="pills-bill-info-tab"><i
                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back </button>
                                <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                    wire:click='createTransaction()' wire:loading.class='d-none'><i
                                        class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                                    Order</button>
                            </div>
                        </div>
                        <!-- end tab pane -->
                        @elseif ($isFinish == true)
                        <div class="tab-pane fade show active" id="pills-finish" role="tabpanel"
                            aria-labelledby="pills-finish-tab">
                            <div class="text-center py-5">

                                <div class="mb-4">
                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                        colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">
                                    </lord-icon>
                                </div>
                                <h5>Thank you ! Your Order is Completed !</h5>
                                <p class="text-muted">You will receive an order confirmation email with details of your
                                    order.</p>

                                <h3 class="fw-semibold">Order ID: <a href="apps-ecommerce-order-details.html"
                                        class="text-decoration-underline">VZ2451</a></h3>
                            </div>
                        </div>
                        <!-- end tab pane -->
                        @endif
                    </div>
                    <!-- end tab content -->
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Order Summary</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless align-middle mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th style="width: 90px;" scope="col">Produk</th>
                                <th scope="col">Produk Info</th>
                                <th scope="col" class="text-end">Harga</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <div class="avatar-md bg-light rounded p-1">
                                        <img src="{{ asset(Storage::url($produk->gambar)) }}" alt=""
                                            class="img-fluid d-block">
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fs-14"><span class="text-body">{{
                                            $produk->nama_produk }}</span></h5>
                                    <p class="text-muted mb-0">Rp {{ number_format($produk->harga , 2 , ',' , '.') }} x
                                        {{ $jml_pesan }}</p>
                                    <div>
                                        <div class="input-step full-width">
                                            <button type="button" class="minus shadow"
                                                wire:click='kurangiJmlPesan()'>–</button>
                                            <input type="number" class="product-quantity" wire:model.live='jml_pesan'>
                                            <button type="button" class="plus shadow"
                                                wire:click='tambahJmlPesan()'>+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">Rp {{ number_format($produk->harga * $jml_pesan , 2 , ',' , '.') }}
                                </td>
                            </tr>

                            <tr class="">
                                <th colspan="2">Ongkir :</th>
                                <td class="text-end">
                                    <span class="">
                                        Rp {{ number_format($biayaOngkir, 2 , ',' , '.') }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="table-active">
                                <th colspan="2">Total (IDR) :</th>
                                <td class="text-end">
                                    <span class="fw-semibold">
                                        Rp {{ number_format($total, 2 , ',' , '.') }}
                                    </span>
                                </td>
                            </tr>


                        </tbody>

                    </table>

                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>