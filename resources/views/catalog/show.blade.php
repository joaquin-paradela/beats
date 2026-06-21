@extends('layouts.app')

@section('title', $beat->name . ' - PB.')

@section('styles')
<style>
    .beat-detail {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem;
    }

    .beat-detail-header {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .beat-detail-cover {
        aspect-ratio: 1;
        border-radius: 8px;
        background: linear-gradient(135deg, #{{ $beat['color'] }} 0%, #{{ $beat['color'] }}aa 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .beat-detail-play {
        background-color: var(--accent-color);
        border: none;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--text-primary);
    }

    .beat-detail-play:hover {
        background-color: #d62828;
        transform: scale(1.1);
    }

    .beat-detail-play svg {
        width: 40px;
        height: 40px;
    }

    .beat-detail-info h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .beat-detail-meta {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .beat-detail-price {
        color: var(--accent-color);
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 2rem;
    }

    .btn-primary {
        background-color: var(--accent-color);
        border: none;
        color: var(--text-primary);
        padding: 1rem 2rem;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #d62828;
    }

    @media (max-width: 768px) {
        .beat-detail-header {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .beat-detail-info h1 {
            font-size: 1.8rem;
        }

        .beat-detail {
            padding: 1rem;
        }
    }
</style>
@endsection

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
