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
                <h1 class="mb-3">Modifica i dati dell'azienda</h1>
                <small class="opacity-75 text-end">I campi con l'asterisco (*) sono obbligatori.</small>
            </div>

            <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
                @method('PUT')
                @csrf
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="name">Nome*</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $company->name }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="logo">Logo*</label>
                    <input class="form-control" type="text" name="logo" id="logo" value="{{ $company->logo }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="vat_num">P.Iva*</label>
                    <input class="form-control" type="text" name="vat_num" id="vat_num" value="{{ $company->vat_num }}" required>
                </div>
        
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </div>
            </form>
        </div>
    </div>
@endsection