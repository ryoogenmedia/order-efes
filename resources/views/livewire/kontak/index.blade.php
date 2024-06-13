<section class="section" id="{{ config('navbar.kontak.url') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h3 class="mb-3 fw-semibold">KONTAK KAMI</h3>
                    {{-- <p class="text-muted mb-4 ff-secondary">We thrive when coming up with innovative ideas but also
                        understand that a smart concept should be supported with faucibus sapien odio measurable
                        results.</p> --}}
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row gy-4">
            <div class="col-lg-4">
                <div>
                    <div class="mt-4">
                        <h5 class="fs-13 text-muted text-uppercase">Alamat</h5>
                        <div class="ff-secondary fw-semibold">{{ $kontak->alamat }}</div>
                    </div>
                    <div class="mt-4">
                        <h5 class="fs-13 text-muted text-uppercase">Email</h5>
                        <div class="ff-secondary fw-semibold">{{ $kontak->email }}</div>
                    </div>
                    <div class="mt-4">
                        <h5 class="fs-13 text-muted text-uppercase">Telepon</h5>
                        <div class="ff-secondary fw-semibold">{{ $kontak->tlp }}</div>
                    </div>
                    <div class="mt-4">
                        <h5 class="fs-13 text-muted text-uppercase">Fax</h5>
                        <div class="ff-secondary fw-semibold">{{ $kontak->fax }}</div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-8">
                <div>
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label fs-13">Nama
                                        @error('nama')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control bg-light border-light"
                                        placeholder="Your name*" wire:model='nama'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="email" class="form-label fs-13">Email
                                        @error('email')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="email" class="form-control bg-light border-light"
                                        placeholder="Your email*" wire:model='email'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="subject" class="form-label fs-13">Subject
                                        @error('subjek')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control bg-light border-light"
                                        placeholder="Your Subject.." wire:model='subjek'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="comments" class="form-label fs-13">Message
                                        @error('pesan')
                                        <code>{{ $message }}</code>
                                        @enderror
                                    </label>
                                    <textarea rows="5" class="form-control bg-light border-light"
                                        placeholder="Your message..." wire:model='pesan'></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-end">
                                <button type="submit" class="submitBnt btn btn-primary" wire:click='sendMessage()'
                                    wire:loading.attr='disabled'>Send Message </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>