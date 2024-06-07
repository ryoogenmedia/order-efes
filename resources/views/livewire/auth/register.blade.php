<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card mt-4">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">Create New Account</h5>
                <p class="text-muted">Get your free {{ env('APP_NAME') }} account now</p>
            </div>
            <div class="p-2 mt-4">
                <form class="needs-validation" novalidate method="POST" wire:submit='save()'>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id=" name"
                            placeholder="Enter name" required wire:model.live='nama'>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Telepon" class="form-label">Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('telp') is-invalid @enderror " id="Telepon"
                            placeholder="Enter Telepon" required wire:model.live='telp'>
                        @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                            placeholder="Enter email address" required wire:model.live='email'>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="password-input">Password</label>
                        <div class="position-relative auth-pass-inputgroup">
                            <input type="{{ $inputType }}"
                                class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                onpaste="return false" placeholder="Enter password" id="password-input"
                                aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                                wire:model='password' wire:model.live='password'>
                            <button wire:click='changeInputType()'
                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon"
                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a href="#"
                                class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                    </div>


                    <div class="mt-4">
                        <button class="btn btn-success w-100" wire:loading.attr='disabled'>
                            <span wire:loading.class='d-none'>Sign Up</span>
                            <span class="d-none" wire:loading.class.remove='d-none'>Loading ...</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->

    <div class="mt-4 text-center">
        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
                class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
    </div>

</div>