<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">Order History {{ $status }}</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            {{-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                id="create-btn" data-bs-target="#showModal"><i
                                    class="ri-add-line align-bottom me-1"></i> Create
                                Order</button> --}}
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
                    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-5 gap-2" role="tablist">
                        <div class="d-flex flex-wrap gap-2 mb-3 mb-lg-0">

                            @php
                            if ($status == '') {
                            $all = '' ;
                            } else {
                            $all = '-outline' ;
                            }
                            @endphp
                            <li class="nav-item">
                                <button type="button" class="btn btn{{ $all }}-info" wire:click="setStatus('')"><i
                                        class="ri-file-download-line align-bottom me-1"></i> ALL</button>
                            </li>
                            @foreach ($enumStatus as $key => $val)
                            @php
                            $active = '-outline' ;
                            @endphp
                            @if ($status == $val)
                            @php
                            $active = '' ;
                            @endphp
                            @endif
                            <li class="nav-item" wire:loading.attr='disabled'>
                                <button type="button" class="btn btn{{ $active }}-info text-capitalize"
                                    wire:click="setStatus('{{ $val }}')"><i
                                        class="ri-file-download-line align-bottom me-1 "></i> {{ $val
                                    }}</button>
                            </li>
                            @endforeach

                    </ul>

                    <div class="table-responsive table-card mb-1">

                        <table class="table table-nowrap align-middle" id="">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th data-sort="id">Kode </th>
                                    <th data-sort="customer_name">User</th>
                                    <th data-sort="product_name">Metode Pengiriman</th>
                                    <th data-sort="date">Tanggal</th>
                                    <th data-sort="amount">Total Pembayaran</th>
                                    {{-- <th data-sort="payment">Status Pembayaran User</th> --}}
                                    <th data-sort="status">Status Pesanan</th>
                                    <th data-sort="city">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" wire:ignore.self>
                                @foreach ($transaksis as $transaksi)

                                <tr>

                                    <td class="id"><a
                                            href="{{ route('admin.transaksi.detail' ,['id' =>  $transaksi->id]) }}"
                                            class="fw-medium link-primary">{{ $transaksi->kode_transaksi }}</a></td>
                                    <td class="customer_name">{{ $transaksi->user->nama }}</td>
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
                                    {{-- @php
                                    $colorI = '' ;

                                    if ($transaksi->informasiPembayaran != null) {
                                    switch ($transaksi->informasiPembayaran->status) {
                                    case 'pending':
                                    $colorI = 'warning' ;
                                    break;
                                    case 'completed':
                                    $colorI = 'success' ;
                                    break;
                                    case 'failed':
                                    $colorI = 'danger' ;
                                    break;
                                    default:
                                    $colorI = 'warning' ;
                                    break;
                                    }
                                    }else {
                                    $colorI = '' ;
                                    }
                                    @endphp
                                    <td class="payment text-uppercase text-{{ $colorI }}">{{
                                        $transaksi->informasiPembayaran ?
                                        $transaksi->informasiPembayaran->status : '' }}
                                    </td> --}}
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
                                    $color = 'muted' ;
                                    break;
                                    case 'pembuatan':
                                    $color = 'info' ;
                                    break;

                                    default:
                                    $color = 'muted' ;
                                    break;
                                    }
                                    @endphp
                                    <td class="status"><span
                                            class="badge bg-{{ $color }}-subtle text-{{ $color }} text-uppercase">{{
                                            $transaksi->status }}</span>
                                        @if ($transaksi->status == 'menunggu konfirmasi')

                                        <button type="button"
                                            class="btn btn-outline-success btn-label waves-effect right waves-light rounded-pill"
                                            wire:click="updateStatus({{ $transaksi->id }})"
                                            wire:loading.attr='disabled'><i
                                                class="ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2"></i>
                                            Konfirmasi</button>
                                        @endif
                                        @if ($transaksi->status == 'pembuatan')

                                        <a href="{{ route('admin.transaksi.detail' ,['id' =>  $transaksi->id]) }}"
                                            class="btn btn-outline-info btn-label waves-effect right waves-light rounded-pill"
                                            wire:loading.attr='disabled'><i class=" ri-caravan-line label-icon align-middle rounded-pill fs-16
                                            ms-2"></i>
                                            Konfirmasi Pengiriman</a>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="{{ route('admin.transaksi.detail' ,['id' =>  $transaksi->id]) }}"
                                                    class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                <a class="text-danger d-inline-block remove-item-btn"
                                                    data-bs-toggle="modal" href="#deleteOrder"
                                                    wire:click="setTransaksi_id('{{ $transaksi->id }}')">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{-- <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div> --}}
                </div>


                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form class="tablelist-form" autocomplete="off">
                                <div class="modal-body">
                                    <input type="hidden" id="id-field" />

                                    <div class="mb-3" id="modal-id">
                                        <label for="orderId" class="form-label">ID</label>
                                        <input type="text" id="orderId" class="form-control" placeholder="ID"
                                            readonly />
                                    </div>

                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Customer Name</label>
                                        <input type="text" id="customername-field" class="form-control"
                                            placeholder="Enter name" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="productname-field" class="form-label">Product</label>
                                        <select class="form-control" data-trigger name="productname-field"
                                            id="productname-field" required />
                                        <option value="">Product</option>
                                        <option value="Puma Tshirt">Puma Tshirt</option>
                                        <option value="Adidas Sneakers">Adidas Sneakers</option>
                                        <option value="350 ml Glass Grocery Container">350 ml Glass Grocery Container
                                        </option>
                                        <option value="American egale outfitters Shirt">American egale outfitters Shirt
                                        </option>
                                        <option value="Galaxy Watch4">Galaxy Watch4</option>
                                        <option value="Apple iPhone 12">Apple iPhone 12</option>
                                        <option value="Funky Prints T-shirt">Funky Prints T-shirt</option>
                                        <option value="USB Flash Drive Personalized with 3D Print">USB Flash Drive
                                            Personalized with 3D Print</option>
                                        <option value="Oxford Button-Down Shirt">Oxford Button-Down Shirt</option>
                                        <option value="Classic Short Sleeve Shirt">Classic Short Sleeve Shirt</option>
                                        <option value="Half Sleeve T-Shirts (Blue)">Half Sleeve T-Shirts (Blue)</option>
                                        <option value="Noise Evolve Smartwatch">Noise Evolve Smartwatch</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Order Date</label>
                                        <input type="date" id="date-field" class="form-control"
                                            data-provider="flatpickr" required data-date-format="d M, Y"
                                            data-enable-time required placeholder="Select date" />
                                    </div>

                                    <div class="row gy-4 mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="amount-field" class="form-label">Amount</label>
                                                <input type="text" id="amount-field" class="form-control"
                                                    placeholder="Total amount" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="payment-field" class="form-label">Payment Method</label>
                                                <select class="form-control" data-trigger name="payment-method" required
                                                    id="payment-field">
                                                    <option value="">Payment Method</option>
                                                    <option value="Mastercard">Mastercard</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="COD">COD</option>
                                                    <option value="Paypal">Paypal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="delivered-status" class="form-label">Delivery Status</label>
                                        <select class="form-control" data-trigger name="delivered-status" required
                                            id="delivered-status">
                                            <option value="">Delivery Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Pickups">Pickups</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Returns">Returns</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                </lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a Transaksi ?</h4>
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your
                                        information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button class="btn btn-link link-success fw-medium text-decoration-none"
                                            id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                class="ri-close-line me-1 align-middle"></i> Close</button>
                                        <button class="btn btn-danger" id="delete-record" wire:click='deleteTransaksi()'
                                            data-bs-dismiss="modal">Yes, Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->