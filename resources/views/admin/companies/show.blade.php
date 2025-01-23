@extends('layouts.admin')

@section('content')
    <h1>{{ $company->name }}</h1>
    <p>VAT Number: {{ $company->vat_num }}</p>
    <img src="{{ $company->logo }}" alt="{{ $company->name }}" width="100">

    <h2>Employees</h2>
    @if($employees->isEmpty())
        <p>No employees found for this company.</p>
    @else
        <ul>
            @foreach($employees as $employee)
                <li>{{ $employee->name }} - {{ $employee->position }}</li>
            @endforeach
        </ul>
    @endif
@endsection