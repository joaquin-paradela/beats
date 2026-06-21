@extends('layouts.app')

@section('title', 'Catálogo de Beats - PB.')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        padding: 4rem 2rem;
        text-align: center;
        margin-bottom: 3rem;
    }

    .hero-content {
        max-width: 600px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .hero-accent {
        color: var(--accent-color);
    }

    .hero-subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
    }

    /* Filters Section */
    .filters-section {
        padding: 2rem;
        background-color: var(--bg-secondary);
        border-radius: 8px;
        margin-bottom: 3rem;
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        align-items: center;
    }

    .filters-label {
        color: var(--text-primary);
        font-weight: 500;
        font-size: 0.95rem;
    }

    .filters-chips {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .filter-chip {
        background-color: transparent;
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        padding: 0.5rem 1.25rem;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .filter-chip:hover {
        border-color: var(--accent-color);
        color: var(--accent-color);
    }

    .filter-chip.active {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
        color: var(--text-primary);
    }

    /* Grid Section */
    .beats-grid {
        padding: 0 2rem;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }

    /* Beat Card */
    .beat-card {
        background-color: var(--bg-secondary);
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .beat-card:hover {
        border-color: var(--accent-color);
        transform: translateY(-4px);
    }

    .beat-card-cover {
        width: 100%;
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .beat-card-play {
        background-color: var(--accent-color);
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--text-primary);
    }

    .beat-card-play:hover {
        background-color: #d62828;
        transform: scale(1.1);
    }

    .beat-card-play svg {
        width: 24px;
        height: 24px;
    }

    .beat-card-info {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .beat-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .beat-card-meta {
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    .beat-card-price {
        color: var(--accent-color);
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .btn-contact {
        background-color: transparent;
        border: 1px solid var(--accent-color);
        color: var(--accent-color);
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 500;
        margin-top: auto;
    }

    .btn-contact:hover {
        background-color: var(--accent-color);
        color: var(--text-primary);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero {
            padding: 2rem 1rem;
        }

        .filters-section {
            padding: 1.5rem;
            gap: 1rem;
        }

        .grid-container {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            padding: 0;
        }

        .beats-grid {
            padding: 0 1rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-0">
    @include('catalog.partials.hero')
    
    <div class="container-fluid px-4">
        @include('catalog.partials.filters')
        @include('catalog.partials.grid', ['beats' => $beats])
    </div>
</div>
@endsection
