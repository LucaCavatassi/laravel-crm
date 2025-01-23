@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-5 px-4">
            {{-- Info --}}
            <div class="d-flex justify-content-between">
                <h1 class="mb-2">Tutte le aziende</h1>
                <small class="opacity-75 fw-bold align-self-center">Clicca per vedere i dettagli dell'azienda</small>
            </div>
            {{-- Info --}}

            {{-- Index --}}
            <div class="list-group">
                {{-- Item --}}
                @foreach ($companies as $company)
                <a href="{{ route('admin.companies.show', $company->name) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3 mb-3" aria-current="true">
                    {{-- Logo --}}
                    <img src={{ $company->logo }} alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 align-self-center">
                    {{-- Logo --}}
                    {{-- Info --}}
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $company->name }}</h6>
                            <p class="mb-0 opacity-75"> 
                                <span>P.iva - </span> 
                                <span class="fw-bold">{{ $company->vat_num }}</span>
                            </p>
                        </div>
                    </div>
                    {{-- Info --}}
                </a>
                @endforeach
                {{-- Item --}}
            </div>
            {{-- Index --}}
        </div>

    </div>
@endsection