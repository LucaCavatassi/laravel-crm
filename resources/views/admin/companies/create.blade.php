@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-3">
            <h1 class="mb-3">Aggiungi nuova azienda</h1>

            <form action="{{ route('admin.companies.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="name">Nome</label>
                    <input class="form-control" type="text" name="name" id="name" value="" placeholder="Inserisci il nome dell'azienda" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="email">Partita Iva</label>
                    <input class="form-control" type="number" name="email" id="email" value="Inserisci il numero di partita iva" minlength="11" maxlength="11" required>
                </div>

                <div class="mb-3">
                    <label class="form-label opacity-75 fw-bold" for="surname">Logo</label>
                    <input class="form-control" type="text" name="surname" id="surname" value=""required>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Crea</button>
                </div>
            </form>
        </div>
    </div>

@endsection