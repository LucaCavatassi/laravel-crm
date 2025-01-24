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

            <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="name">Nome*</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') ?? $company->name }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="vat_num">P.Iva*</label>
                    <input class="form-control" type="text" name="vat_num" id="vat_num" value="{{ old('vat_num') ?? $company->vat_num }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="logo">Logo*</label>
                    <input class="form-control" type="file" name="logo" id="logo" onchange="previewLogo(event)">
                </div>            
            
                <div class="d-flex justify-content-between mt-3">
                    <div class="d-flex flex-column justify-content-center align-content-center">
                        <p class="fw-bold opacity-75">Logo attuale</p>
                        <img style="object-fit: cover" src="{{ asset($company->logo) }}" alt="{{ $company->name }}" width="150" height="150" class="rounded flex-shrink-0 align-self-center" id="logo-preview">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg h-50 align-self-end">Modifica</button>
                </div>
            </form>
        </div>
    </div>
@endsection