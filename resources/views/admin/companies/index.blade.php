@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-4 p-4">
            {{-- Info --}}
            <div class="d-flex justify-content-between">
                <h1 class="mb-2">Tutte le aziende</h1>
                <small class="opacity-75 align-self-center text-end">Clicca sul nome per vedere i dettagli dell'azienda</small>
            </div>
            {{-- Info --}}

            {{-- Index --}}
            <div class="list-group">
                {{-- Item --}}
                @foreach ($companies as $company)
                <div class="list-group-item list-group-item-action d-flex justify-content-between mb-3">
                    <div>
                        <a style="text-decoration: none" href="{{ route('admin.companies.show', $company->id) }}" class="d-flex gap-3 py-3 text-black" aria-current="true">
                            {{-- Logo --}}
                            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" width="50" height="50" class="rounded-circle flex-shrink-0 align-self-center">
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
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-end gap-0 gap-md-3">
                        <form id="edit-form-{{ $company->id }}" action="{{ route('admin.companies.edit', $company->id) }}" method="GET">
                            @csrf
                        </form>
                        <button class="btn btn-primary mb-2 mb-md-0 h-50 align-self-center" onclick="event.preventDefault(); document.getElementById('edit-form-{{ $company->id}}').submit();">
                            <span class="d-none d-md-inline">Modifica</span>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-danger h-50 align-self-center" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $company->id }}">
                            <span class="d-none d-md-inline">Elimina</span>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal (Unique ID per company) -->
                <div class="modal fade" id="deleteModal-{{ $company->id }}" tabindex="-1" aria-labelledby="deleteModal-{{ $company->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Vuoi davvero eliminare questa azienda?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Clicca elimina per eliminarla definitivamente o chiudi per tornare indietro.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <form action="{{ route('admin.companies.destroy', ['company' => $company->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Item --}}
            </div>
            {{-- Index --}}
        </div>

    </div>
@endsection