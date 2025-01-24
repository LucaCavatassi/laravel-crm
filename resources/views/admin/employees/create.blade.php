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
                <h1 class="mb-3">Crea dipendente</h1>
                <small class="opacity-75 text-end">I campi con l'asterisco (*) sono obbligatori.</small>
            </div>
            <form action="{{ route('admin.employees.store')}}" method="POST">
                @csrf
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="name">Nome*</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="surname">Cognome*</label>
                    <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname') }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="email">Email*</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="phone">Telefono*</label>
                    <input class="form-control" type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <label class="form-label opacity-75 fw-bold" for="company_id">Azienda*</label>
                        <small class="opacity-75 text-end">Se l’azienda non esiste, crearla prima di aggiungere un dipendente.</small>
                    </div>
                    <div class="d-flex gap-5">
                        <select class="form-select w-75" name="company_id" id="company_id">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        <a href="{{ route('admin.companies.create')}}" class="btn btn-primary flex-grow-1">Crea Azienda</a>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Aggiungi dipendente</button>
                </div>
            </form>
        </div>
    </div>
@endsection