@extends('layouts')
@section('content')

@include('component.sidebar')
<div class="container">
    <div class="mt-3">
        @include('auth.tickets.create-ticket')
    </div>
    <div class="mt-3">
        @include('auth.tickets.ticket-list')
    </div>
</div>

@endsection