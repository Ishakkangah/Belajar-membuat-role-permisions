<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    


   
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.1.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    {{-- font feather --}}
    <link rel="stylesheet" href="{{ asset('css/font-feather.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
    <title>{{ $title ?? 'BinaSriwijaya' }}</title>
</head>
<body>
    <div id="app">
        <main class="py-">
            @yield('content')
        </main>
    </div>

    
    <script src="{{ asset('js/bootstrap-5.1.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js') }}" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>


    
</body>
</html>
