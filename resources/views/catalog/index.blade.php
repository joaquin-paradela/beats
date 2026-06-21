@extends('layouts.app')

@section('title', 'Catálogo de Beats - PB.')

@section('content')
<div class="container-fluid px-0">
    @include('catalog.partials.hero')
    
    <div class="container-fluid px-4">
        @include('catalog.partials.filters')
        @include('catalog.partials.grid', ['beats' => $beats])
    </div>
</div>
@endsection
