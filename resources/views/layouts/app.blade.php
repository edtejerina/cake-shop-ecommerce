<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="/img/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cake Shop</title>
    <!-- Fonts -->
    <link href="{{ asset('fonts/sweet-purple.otf')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header grid-header container">
            <div></div>
            <a href="/"><h1 class="logo">{Cake Shop}</h1></a>
            <div class="menu">
                <nav class="navigation">
                    <a href="">Inicio</a>
                    <a href="{{ route('shop.index') }}">Productos</a>
                    <a href="">Preguntas</a>
                    <a href="">Sobre Nosotros</a>
                </nav>
                <a href="/cart" class="cart-icon">
                    <span>
                        @if(session('cart'))
                            {{ count(session('cart')) }}
                        @else
                            0
                        @endif
                    </span>
                    <img src="/img/cart.svg" alt="cart">
                </a>
            </div>
            <div class="burger">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>  
    </header>
    <main>
    @yield('content')
    </main>
    <section class="spikes"></section>
    <footer>
        
    </footer>
    
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>
    