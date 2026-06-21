<section class="beats-grid">
    <div class="grid-container">
        @forelse ($beats as $beat)
            @include('components.beat-card', ['beat' => $beat])
        @empty
            <p class="no-beats">No hay beats disponibles.</p>
        @endforelse
    </div>
</section>
