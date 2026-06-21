<section class="beats-grid">
    <div class="grid-container">
        @foreach ($beats as $beat)
            @include('components.beat-card', ['beat' => $beat])
        @endforeach
    </div>
</section>
