<div class="row">
    <div class="col-lg-12">
        <div class="card" id="leadsList">

            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle" id="customerTable">
                            <thead class="table-light">
                                <tr>

                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>tanggal</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach ($messages as $message )
                                <tr>
                                    <td>{{ $message->nama }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subjek }}</td>
                                    <td>{{ $message->created_at }}</td>
                                    <td class="text-wrap ">{{ $message->pesan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{-- <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0">
                                <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                            </ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>