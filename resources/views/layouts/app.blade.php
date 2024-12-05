<html>
    <head>
        <title>@yield('title')</title>
        @yield('css')
    </head>
    <header>
        <a class="logo" href="/"></a>
        <a class="menubutton" href="/clients">Клиенты</a>
        <a class="menubutton" href="/orders">Заказы</a>
    </header>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>