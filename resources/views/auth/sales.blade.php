@extends('layouts')
@section('content')

@include('component.sidebar')
<div class="container">
    <div class="mt-3">
        @include('auth.sales.create-sale')
    </div>
    <div class="mt-3">
        @include('auth.sales.sales-list')
    </div>
</div>

@endsection