@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- Info company --}}
    <div class="d-flex justify-content-start gap-4 align-items-center my-4">
        <img class="rounded-circle flex-shrink-0" src="{{ $company->logo }}" alt="{{ $company->name }}" width="100" height="100">
        <div>
            <h1>{{ $company->name }}</h1>
            <p>
                <span class="opacity-75">
                    Partita Iva - 
                </span>
                <span class="fw-bold">
                    {{ $company->vat_num }}
                </span> 
            </p>
        </div>
    </div>
    {{-- Info company --}}

    {{-- Employee --}}
    <div>
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
                        <div class="col-3 d-flex flex-column flex-md-row justify-content-end gap-0 gap-md-3">
                            <button class="btn btn-primary mb-2 mb-md-0">
                                <span class="d-none d-md-inline">Modifica</span>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger">
                                <span class="d-none d-md-inline">Elimina</span>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    {{-- Employee --}}
</div>
@endsection