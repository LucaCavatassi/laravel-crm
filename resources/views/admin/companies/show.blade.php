@extends('layouts.admin')

@section('content')
    <h1>{{ $company->name }}</h1>
    <p>VAT Number: {{ $company->vat_num }}</p>
    <img src="{{ $company->logo }}" alt="{{ $company->name }}" width="100">

    <h2>Lista dei dipendenti</h2>
    @if($company->employees->isEmpty())
        <p>Non ci sono dipendenti in questa azienda.</p>
    @else
        @foreach($company->employees as $employee)
            <div class="card mb-2">
                <div class="card-body row justify-content-between align-items-center">
                    <div class="col-9">
                        <p class="mb-0">
                            <span>Nome - </span>
                            <span class="fw-bold">
                                {{ $employee->name }} {{ $employee->surname }}
                            </span>
                        </p>
                        <p class="mb-0">
                            <span>Email - </span>
                            <span class="fw-bold">
                                {{ $employee->email }}
                            </span>
                        </p>
                        <p class="mb-0">
                            <span>Telefono - </span>
                            <span class="fw-bold">
                                {{ $employee->phone }}
                            </span>  
                        </p>
                    </div>
                    <div class="col-3 d-flex justify-content-end gap-3">
                        <button class="btn btn-primary">Modifica</button>
                        <button class="btn btn-danger">Elimina</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection