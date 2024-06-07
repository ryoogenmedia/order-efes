@foreach ($navbar as $nav )

<li class="nav-item">
    <a class="nav-link fs-15 " href="#{{ $nav['url'] }}">{{ Str::ucfirst($nav['title']) }}</a>
</li>
@endforeach