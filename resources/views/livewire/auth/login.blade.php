<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card mt-4">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">Welcome Back !</h5>
                <p class="text-muted">Sign in to continue to {{ env('APP_NAME') }}</p>
            </div>
            <div class="p-2 mt-4">
                <form class="needs-validation" novalidate wire:submit='login()'>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username or Email <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror " id=" name"
                            placeholder="Enter name" required wire:model.live='username'>
                        @error('username')
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

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="auth-remember-check"
                            wire:model='rememberMe'>
                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success w-100" wire:loading.attr='disabled'>
                            <span wire:loading.class='d-none'>Sign In</span>
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
        <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
    </div>