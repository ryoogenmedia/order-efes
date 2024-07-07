@props(['id' => config('navbar.layanan.url') ])
<section class="section" id="{{ $id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="mb-3 fw-semibold lh-base">LAYANAN</h2>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row g-4">
            {{-- @foreach ($layanans as $layanan )

            <div class="col-lg-4 col-md-6 col-sm-12 d-flex">
                <div class="card text-center border w-100">
                    <div class="card-body py-5 px-4 d-flex flex-column align-items-center">
                        <div class="avatar-sm flex-shrink-0 mb-3">
                            <span class="avatar-title bg-light text-primary rounded-circle shadow fs-1  ">
                                <i class="{{ $layanan['icon'] }} align-middle"></i>
                            </span>
                        </div>
                        <h5>{{ Str::upper($layanan['title']) }}</h5>
                        <p class="text-muted pb-1 fs-13">{{ $layanan['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach --}}
            <!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>