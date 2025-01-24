@extends('layouts.admin')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success my-3">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="my-4 p-4">
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
            <div class="d-flex justify-content-between align-content-center">
                <h2>Lista dei dipendenti</h2>
                <a style="text-decoration: none" href="{{ route('admin.companies.show', ['company' => $company->id, 'sort' => request('sort') === 'asc' ? 'desc' : 'asc']) }}" class="opacity-75 align-self-center m-0">
                    Ordina per data di creazione  {{ request('sort') === 'asc' ? '↓' : '↑' }}
                </a>
            </div>
            @if($company->employees->isEmpty())
                <p>Non ci sono dipendenti in questa azienda.</p>
            @else
                @foreach($company->employees as $employee)
                    <div class="card mb-2">
                        <div class="card-body row justify-content-between align-items-center">
                            <div class="col-9 px-0 px-md-4 d-flex justify-content-between">
                                <div>
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
                                <div class="text-end opacity-75">
                                    {{$employee->created_at->format('d/m/Y')}}
                                </div>
                            </div>
                            <div class="col-3 d-flex flex-column flex-md-row justify-content-end gap-0 gap-md-3">
                                <form id="edit-form" action="{{ route('admin.employees.edit', $employee->id) }}" method="GET">
                                    @csrf
                                </form>
                                <button class="btn btn-primary mb-2 mb-md-0" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">
                                    <span class="d-none d-md-inline">Modifica</span>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <span class="d-none d-md-inline">Elimina</span>
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vuoi davvero eliminare questo dipendente?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Clicca elimina per eliminarlo definitivamente o chiudi per tornare indietro.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                    <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            
        </div>
        {{-- Employee --}}
    </div>
</div>
@endsection