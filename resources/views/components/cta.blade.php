<section class="py-5 bg-primary position-relative">
    <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-sm">
                <div>
                    <h4 class="text-white mb-0 fw-semibold">Bergabung bersama kami</h4>
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-auto">
                <div>
                    @guest
                    <a href="{{ route('register') }}" class="btn bg-gradient btn-danger">Register</a>
                    <a href="{{ route('login') }}" class="btn bg-gradient btn-info">Login</a>
                    @endguest
                    @auth
                    <a href="{{ route('dashboard.index') }}" class="btn bg-gradient btn-info">Shop</a>
                    @endauth
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>