@extends('layouts.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Products</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-lg-4">
        @livewire('admin.produk.listKategori')
    </div>
    <!-- end col -->

    <div class="col-xl-9 col-lg-8">
        @livewire('admin.produk.listProduk')
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection