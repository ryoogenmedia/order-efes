<ul class="navbar-nav" id="navbar-nav">


    @foreach (config('efes.admin.navbar') as $navbar )
    @if ($navbar['sub'] != [])
    <li class="nav-item">
        <a class="nav-link menu-link" href="#{{ $navbar['url'] }}" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="{{ $navbar['url'] }}">
            <i class="{{ $navbar['icon'] }}"></i> <span data-key="t-dashboards">{{ $navbar['title'] }}</span>
        </a>
        <div class="collapse menu-dropdown" id="{{ $navbar['url'] }}">
            <ul class="nav nav-sm flex-column">
                @foreach ($navbar['sub'] as $sub )

                <li class="nav-item">
                    <a href="{{ route('admin.'.$sub['url']) }}" class="nav-link  text-capitalize  "
                        data-key="t-analytics">
                        {{ $sub['title'] }} </a>
                </li>
                @endforeach
            </ul>
        </div>
    </li> <!-- end Dashboard Menu -->

    @else
    <li class="nav-item">
        <a class="nav-link menu-link text-capitalize" href="{{ route('admin.'.$navbar['url']) }}">
            <i class="{{ $navbar['icon'] }}"></i> <span data-key="t-widgets">{{ $navbar['title'] }}</span>
        </a>
    </li>
    @endif
    @endforeach

</ul>