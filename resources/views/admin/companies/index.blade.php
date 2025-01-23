@extends('layouts.admin')

@section('content')
    <div class="container">
        @foreach ($companies as $company)
            <span>{{ $company->name }}</span> <br>
        @endforeach

        <div class="list-group">
            {{-- Item --}}
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                {{-- Logo --}}
                <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                {{-- Logo --}}

                {{-- Info --}}
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $company->name }}</h6>
                        <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                    </div>
                    <small class="opacity-50 text-nowrap">now</small>
                </div>
                {{-- Info --}}
            </a>
        </div>
    </div>
@endsection