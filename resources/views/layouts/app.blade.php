<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- SEO Meta Tags -->
    @include('partials.seo')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/home.css'])
    @stack('styles')
</head>
<body>
    <div class="default-layout">
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="/js/main.js"></script>
    @vite(['resources/js/app.ts'])
    @stack('scripts')
</body>
</html>
