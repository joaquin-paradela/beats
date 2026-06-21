@props(['beat'])

<div class="beat-card" data-beat-id="{{ $beat->id }}">
    <div class="beat-card-cover">
        @if ($beat->cover_image)
            <img src="{{ asset('storage/' . $beat->cover_image) }}" alt="{{ $beat->name }}" class="beat-card-image">
        @else
            <div class="beat-card-placeholder">
                <svg viewBox="0 0 24 24" class="beat-card-icon">
                    <path d="M12 3v9.28c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2V3m0 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6-6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2s2-.9 2-2V5c0-1.1-.9-2-2-2zm-12 0C2.9 3 2 3.9 2 5v12c0 1.1.9 2 2 2s2-.9 2-2V5c0-1.1-.9-2-2-2z" fill="currentColor"/>
                </svg>
            </div>
        @endif
        
        <div class="beat-card-bpm-badge">{{ $beat->bpm }} BPM</div>
        
        <button 
            class="beat-card-play" 
            aria-label="Reproducir {{ $beat->name }}"
            data-audio="{{ asset('storage/' . $beat->audio_file) }}"
            data-beat-id="{{ $beat->id }}"
        >
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
