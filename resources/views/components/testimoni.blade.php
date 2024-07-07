<section class="section bg-light" id="{{ config('navbar.testimoni.url') }}">
    <div class="bg-overlay bg-overlay-pattern"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center ">
                    <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">TESTIMONI</h1>
                    {{-- <p class="text-muted mb-4">Hiring experts costs more per hour than hiring entry- or mid-level
                        freelancers, but they can usually get the work done faster—and better.</p> --}}
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper candidate-swiper">
                    <div class="swiper-wrapper">
                        {{-- @foreach ($testimoni as $testi )
                        <div class="swiper-slide">
                            <div class="card text-center">
                                <div class="card-body p-4">
                                    @if ($testi->user->foto != null)
                                    <img src="{{ asset(Storage::url($testi->user->foto)) }}" alt=""
                                        class="rounded-circle avatar-md mx-auto d-block">
                                    @else
                                    <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt=""
                                        class="rounded-circle avatar-md mx-auto d-block">

                                    @endif
                                    <h5 class="fs-17 mt-3 mb-2"></h5>
                                    <p class="text-muted fs-13 mb-3">{{ $testi->user->nama }}</p>
                                    <p>{{ $testi->testimoni }}</p>
                                    <p class="text-muted mb-4 fs-14">
                                        <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> {{
                                        $testi->user->alamat }}
                                    </p>

                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>