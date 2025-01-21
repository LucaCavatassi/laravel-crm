@extends('layouts.app')
@section('content')

<div class="jumbotron">
    <div class="container py-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center">Welcome to the hub to manage all your costumers</h1>
        <a class="text-center fw-bolder fs-3" href="{{ route('login') }}">Login to start</a>
        <div class="arrow">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
@endsection
