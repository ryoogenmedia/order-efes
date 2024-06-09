<footer class="custom-footer bg-dark py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo light" height="17">
                    </div>
                    <div class="mt-4">
                        <p>Premium Multipurpose Admin & Dashboard Template</p>
                        <p>You can build any type of web application like eCommerce, CRM, CMS, Project
                            management apps, Admin Panels, etc using Velzon.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row float-end ">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Menu</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                @foreach ($navbars as $nav )
                                <li><a href="#{{ $nav['url'] }}">{{ Str::ucfirst($nav['title']) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row text-center text-sm-start align-items-center mt-5">
            <div class="col-sm-6">

                <div>
                    <p class="copy-rights mb-0">
                        <script>
                            document.write(new Date().getFullYear()) 
                        </script> © Velzon - Themesbrand
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end mt-3 mt-sm-0">
                    <ul class="list-inline mb-0 footer-social-link">
                        <li class="list-inline-item">
                            <a href="{{ $kontak->facebook }}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ $kontak->instagram }}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-instagram-fill"></i>
                                </div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ $kontak->twitter }}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-twitter-fill"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>