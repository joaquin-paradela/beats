@props(['beat'])

<div class="beat-card">
    <div class="beat-card-cover" style="background: linear-gradient(135deg, #{{ $beat->color }} 0%, #{{ $beat->color }}aa 100%);">
        <button class="beat-card-play" aria-label="Reproducir {{ $beat->name }}">
            <svg viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" fill="currentColor"/>
            </svg>
        </button>
    </div>
    <div class="beat-card-info">
        <h3 class="beat-card-title">{{ $beat->name }}</h3>
        <p class="beat-card-meta">{{ $beat->bpm }} BPM · {{ $beat->genre }}</p>
        <p class="beat-card-price">${{ number_format($beat->price, 2) }}</p>
        <button class="btn-contact">Contactar</button>
    </div>
</div>
