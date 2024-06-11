@extends('layouts.dashboard')

@section('content')
@livewire('admin.transaksi.detailTransaksi' , ['id' => $id])
@endsection