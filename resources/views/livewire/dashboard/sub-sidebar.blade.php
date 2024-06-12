<div>
    @if (Auth::user()->keranjang->count() != 0)
    <li class="nav-item">
        <a class="nav-link menu-link text-capitalize" href="{{ route('dashboard.keranjang') }}">
            <i class="ri-shopping-cart-2-line"></i>
            <span data-key="t-widgets">
                <span class="topbar-badge fs-10 translate-middle badge  rounded-pill bg-info">
                    {{ Auth::user()->keranjang->count() }}
                </span>
                Keranjang
            </span>
        </a>
    </li>
    @endif
</div>