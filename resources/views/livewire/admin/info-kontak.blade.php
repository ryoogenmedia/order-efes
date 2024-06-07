<div class="row">

    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Informasi Bank Pembayaran</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form wire:submit='updatePembayaran()'>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="namaBank" class="form-label">Nama Bank</label>
                                    <input type="text" class="form-control" placeholder="Nama Bank" id="namaBank"
                                        wire:model='bank'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="AtasNam" class="form-label">Atas Nama</label>
                                    <input type="text" class="form-control" placeholder="Atas Nama" id="AtasNam"
                                        wire:model='atas_nama'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="noRek" class="form-label">No. Rekening</label>
                                    <input type="text" class="form-control" placeholder="No. Rekening" id="noRek"
                                        wire:model='rek'>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Informasi Social Media</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form wire:submit='updateSocial()'>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" placeholder="Facebook" id="facebook"
                                        wire:model='facebook'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" placeholder="Twitter" id="twitter"
                                        wire:model='twitter'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" placeholder="Instagram" id="instagram"
                                        wire:model='instagram'>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Informasi Kontak</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form wire:submit='updateKontak()'>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" id="email"
                                        wire:model='email'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="telp" class="form-control" placeholder="Enter Telepon" id="telp"
                                        wire:model='tlp'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="fax" class="form-control" placeholder="Enter Fax" id="fax"
                                        wire:model='fax'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap"
                                        wire:model='alamat'></textarea>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>