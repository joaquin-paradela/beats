<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beats - PB.')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos globales -->
    <style>
        :root {
            --bg-primary: #0d0d0d;
            --bg-secondary: #1a1a1a;
            --text-primary: #ffffff;
            --text-secondary: #888888;
            --accent-color: #e63946;
            --border-color: #2a2a2a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            overflow-x: hidden;
        }
    </style>

    @yield('styles')

    <!-- Component styles -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/player.css') }}">

    <!-- Catalog styles -->
    <link rel="stylesheet" href="{{ asset('css/catalog/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog/show.css') }}">

    <!-- WhatsApp Sticky Button -->
    <link rel="stylesheet" href="{{ asset('css/whatsapp-sticky.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="container-fluid">
        @yield('content')
    </main>

    <!-- Audio Player -->
    <div class="player-sticky">
        <div class="player-container">
            @include('components.player')
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- WhatsApp Sticky Button -->
    @include('components.whatsapp-sticky')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
