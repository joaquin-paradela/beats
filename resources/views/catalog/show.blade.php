@extends('layouts.app')

@section('title', $beat->name . ' - PB.')

@section('content')
<div class="beat-detail">
    <div class="beat-detail-header">
        <div class="beat-detail-cover" style="background: linear-gradient(135deg, #{{ $beat->color }} 0%, #{{ $beat->color }}aa 100%);">
            <button class="beat-detail-play" aria-label="Reproducir">
                <svg viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" fill="currentColor"/>
                </svg>
            </button>
        </div>
        <div class="beat-detail-info">
            <h1>{{ $beat->name }}</h1>
            <p class="beat-detail-meta">{{ $beat->genre }} · {{ $beat->bpm }} BPM</p>
            <p class="beat-detail-price">${{ number_format($beat->price, 2) }}</p>
            <button class="btn-primary">Contactar para comprar</button>
        </div>
    </div>
</div>
@endsection
