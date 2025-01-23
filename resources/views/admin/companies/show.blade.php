@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>
        <p><strong>VAT Number:</strong> {{ $company->vat_num }}</p>
        <img src="{{ $company->logo }}" alt="{{ $company->name }}" width="100">
    </div>
@endsection