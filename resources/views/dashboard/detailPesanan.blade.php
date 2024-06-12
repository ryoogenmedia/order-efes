@extends('layouts.user')

@section('content')
@livewire('dashboard.detailPesanan ' , ['id' => $id])
@endsection