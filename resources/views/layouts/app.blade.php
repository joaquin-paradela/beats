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

        /* Navbar */
        .navbar-app {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            z-index: 1030;
            padding: 1rem 2rem;
        }

        .navbar-app .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: var(--text-primary);
            letter-spacing: 0.15em;
        }

        .navbar-logo .logo-p {
            color: var(--text-primary);
        }

        .navbar-logo .logo-dot {
            color: var(--accent-color);
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .navbar-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
        }

        .navbar-links a:hover {
            color: var(--accent-color);
        }

        /* Main content */
        main {
            margin-top: 80px;
            margin-bottom: 100px;
            min-height: calc(100vh - 180px);
            padding: 2rem 0;
        }

        /* Footer */
        footer {
            background-color: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 2rem;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        /* Audio Player */
        .player-sticky {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 1rem 2rem;
            z-index: 1020;
        }

        .player-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            max-width: 100%;
        }

        .player-play-btn {
            background-color: var(--accent-color);
            border: none;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            transition: background-color 0.3s ease;
        }

        .player-play-btn:hover {
            background-color: #d62828;
        }

        .player-play-btn svg {
            width: 24px;
            height: 24px;
            fill: var(--text-primary);
        }

        .player-info {
            flex: 0 0 200px;
            min-width: 0;
        }

        .player-info .beat-name {
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .player-info .beat-genre {
            color: var(--text-secondary);
            font-size: 0.75rem;
        }

        .player-progress {
            flex: 1;
            min-width: 100px;
        }

        .progress-bar-custom {
            background-color: var(--border-color);
            height: 4px;
            border-radius: 2px;
            cursor: pointer;
            position: relative;
        }

        .progress-bar-custom::after {
            content: '';
            position: absolute;
            height: 100%;
            background-color: var(--accent-color);
            border-radius: 2px;
            width: 0%;
            transition: width 0.1s linear;
        }

        .player-time {
            color: var(--text-secondary);
            font-size: 0.75rem;
            flex: 0 0 50px;
            text-align: right;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .navbar-app {
                padding: 0.75rem 1rem;
            }

            .navbar-links {
                gap: 1rem;
            }

            .player-container {
                gap: 0.75rem;
                padding: 0.75rem;
            }

            .player-info {
                flex: 0 0 120px;
            }

            .player-play-btn {
                width: 40px;
                height: 40px;
            }

            .player-play-btn svg {
                width: 20px;
                height: 20px;
            }

            main {
                margin-top: 60px;
                margin-bottom: 90px;
                padding: 1rem 0;
            }

            .navbar-logo {
                font-size: 1.25rem;
            }

            .navbar-links a {
                font-size: 0.85rem;
            }
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-secondary);
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="container-fluid">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Audio Player -->
    <div class="player-sticky">
        <div class="player-container">
    @include('components.player')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">@yield('scripts')
</body>
</html>
