@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1 text-capitalize">Welcome {{ Auth::user()->nama }}</h4>
                            <p class="text-muted mb-0">Here's what's happening with your store
                                today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <div class="row g-3 mb-0 align-items-center">
                                <!--end col-->
                                <div class="col-auto">
                                    <a href="{{ route('admin.produk') }}" class="btn btn-soft-success shadow-none"><i
                                            class="ri-add-circle-line align-middle me-1"></i>
                                        Add Product</a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <x-admin.widget />

            @livewire('admin.infoKontak')
        </div> <!-- end .h-100-->

    </div> <!-- end col -->

</div>
<!-- end col -->
@endsection