<div class="row" wire:ignore.self>
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4" wire:ignore>
                        @if ($user->foto)
                        @if (Storage::exists( 'public/',$user->foto))
                        <img src="{{ asset(Storage::url($user->foto)) }}"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                            alt="user-profile-image">
                        @else
                        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                            alt="user-profile-image">
                        @endif

                        @else
                        <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                            alt="user-profile-image">
                        @endif
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input"
                                wire:model='foto'>
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body shadow">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1">{{ $user->nama }}</h5>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                            <i class="fas fa-home"></i> Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i> Change Password
                        </a>
                    </li>

                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First Name
                                            @error('data.nama')
                                            <code>{{ $message }}</code>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" id="firstnameInput"
                                            placeholder="Enter your firstname" wire:model='data.nama'>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phonenumberInput"
                                            placeholder="Enter your phone number" wire:model='data.telp'>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="emailInput"
                                            placeholder="Enter your email" wire:model='data.email'>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="cityInput" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" id="cityInput" placeholder="Provinsi"
                                            wire:model='data.provinsi' />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Kota</label>
                                        <input type="text" class="form-control" id="countryInput" placeholder="Kota"
                                            wire:model='data.kota' />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="kecamatan" class="form-label">kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" placeholder="kecamatan"
                                            wire:model='data.kecamatan' />
                                    </div>
                                </div>
                                <!--end col-->
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea"
                                            placeholder="Alamat " rows="3"
                                            wire:model='data.alamat'>{{ $data['alamat'] }}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary" wire:click='update()'
                                            wire:loading.attr='disabled'>Updates</button>
                                        <button type="button" class="btn btn-soft-success"
                                            wire:click='cancel()'>Cancel</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row g-2">

                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">New Password
                                            @error('newPassword')
                                            <code>{{ $message }}</code>
                                            @enderror
                                        </label>
                                        <input type="password" class="form-control" id="newpasswordInput"
                                            placeholder="Enter new password" wire:model='newPassword'>
                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->
                                {{-- <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);"
                                            class="link-primary text-decoration-underline">Forgot
                                            Password ?</a>
                                    </div>
                                </div> --}}
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success"
                                            wire:click='updatePassword()'>Change Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>

                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>