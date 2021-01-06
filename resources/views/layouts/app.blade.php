<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    
    
</head>
<body>
    <div id="app">
        
        @include('partials.menu')

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 com-md-offset-2">
                        @include('partials.flash')
                    </div>
                </div>
            </div>
            
            @yield('content')
            
        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('javascripts')
</body>
</html>
