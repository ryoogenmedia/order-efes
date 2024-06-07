@extends('layouts.landing')

@section('content')
<!-- start hero section -->
<x-section.hero />
<!-- end hero section -->

<!-- start wallet -->
<x-section.layanan />
<!-- end wallet -->


<!-- start marketplace -->
@livewire('produk.index')
<!-- end marketplace -->

<x-testimoni />

<x-tentang />
{{-- KONTAK --}}
@livewire('kontak.index')
{{-- ENd Kontak --}}

<!-- start cta -->
<x-cta />
<!-- end cta -->


@endsection