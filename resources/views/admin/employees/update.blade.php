@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-4 p-4">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show my-3"  role="alert">
                        <p class="mb-0">{{ $error }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
    
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="mb-3">Modifica i dati del dipendente</h1>
                <small class="opacity-75 text-end">I campi con l'asterisco (*) sono obbligatori.</small>
            </div>
            <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
                @method('PUT')
                @csrf
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="name">Nome*</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') ?? $employee->name }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="surname">Cognome*</label>
                    <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname') ?? $employee->surname }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="email">Email*</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') ?? $employee->email }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="phone">Telefono*</label>
                    <input class="form-control" type="tel" name="phone" id="phone" value="{{ old('phone') ?? $employee->phone }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="company_id">Azienda*</label>
                    <select class="form-select" name="company_id" id="company_id">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Modifica</button>
                </div>
            </form>
        </div>
    </div>
@endsection