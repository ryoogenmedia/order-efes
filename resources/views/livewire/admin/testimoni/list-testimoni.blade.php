<div class="row">
    <div class="col-lg-12">
        <div class="card" id="invoiceList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Testimoni User</h5>
                </div>
            </div>
            <div class="card-body bg-light-subtle border border-dashed border-start-0 border-end-0">
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="invoiceTable">
                            <thead class="text-muted">
                                <tr>
                                    <th class=" text-uppercase">User</th>
                                    <th class=" text-uppercase">Testimoni</th>
                                    <th class=" text-uppercase">Tanggal</th>
                                    <th class=" text-uppercase">Status</th>
                                    <th class=" text-uppercase" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" id="invoice-list-data">

                                @foreach ($testimonis->paginate($perPage , page : $page) as $testimoni )
                                <tr>

                                    <td class="customer_name">
                                        <div class="d-flex align-items-center">
                                            @if ($testimoni->user->foto != null )
                                            <img src="{{ asset(Storage::url($testimoni->user->foto)) }}" alt="Profile"
                                                class="avatar-xs rounded-circle me-2">
                                            @else
                                            <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                                                alt="Profile" class="avatar-xs rounded-circle me-2">
                                            @endif
                                            {{ $testimoni->user->nama }}
                                        </div>
                                    </td>
                                    <td class="email text-wrap">{{ $testimoni->testimoni }}</td>
                                    <td class="date">{{ $testimoni->created_at->format('d M, Y') }} <small
                                            class="text-muted">{{ $testimoni->created_at->format('H:i A') }}</small>
                                    </td>
                                    <td class="country">
                                        @if ($testimoni->is_show == false)
                                        <span>Not Showing</span>
                                        @elseif ($testimoni->is_show == true)
                                        <span class="text-success">Showing</span>
                                        @endif
                                    </td>
                                    <td class="invoice_amount">
                                        @if ($testimoni->is_show == false)
                                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"
                                            wire:click="update('{{ $testimoni->id }}' , false)"
                                            title="show this testimoni">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                        @elseif ($testimoni->is_show == true)
                                        <button type="button" class="btn btn-success btn-icon waves-effect waves-light"
                                            wire:click="update('{{ $testimoni->id }}' , true)"
                                            title="Dont show this testimoni">
                                            <i class="ri-close-line"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <button class="page-item pagination-prev disabled cursor-pointer" wire:click='previous()'>
                                Previous
                            </button>
                            {{ $testimonis->paginate($perPage , page : $page)->currentPage() }} of {{
                            $testimonis->paginate($perPage , page : $page)->lastPage() }}
                            <button class="page-item pagination-next cursor-pointer"
                                wire:click="next({{$testimonis->paginate($perPage , page : $page)->lastPage()}})">
                                Next
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>