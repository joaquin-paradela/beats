<div class="player-sticky">
    <div class="player-container">
        <button class="player-play-btn" id="playerPlayBtn" aria-label="Reproducir">
            <svg viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </button>
        <div class="player-info">
            <div class="beat-name">Selecciona un beat</div>
            <div class="beat-genre">Rap</div>
        </div>
        <div class="player-progress">
            <div class="progress-bar-custom"></div>
        </div>
        <div class="player-time">0:00</div>
    </div>
</div>

<script>
    document.getElementById('playerPlayBtn').addEventListener('click', function() {
        console.log('Play button clicked');
        // Lógica del player será implementada aquí
    });
</script>
