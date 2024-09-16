<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{ asset('/js/classes/Input.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>@yield('main-title')</title>
</head>
<body class="d-flex flex-column">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Тестовое
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand text-white" href="{{ url('/cart') }}">
                            Корзина
                        </a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-4 container" style="flex: 1">
        @yield('content')
    </main>
    <footer class="py-3 bg-dark">
        <div class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
            <div class="col-md-4 d-flex align-items-center">
                <a class="px-2 text-muted" href="{{ url('/') }}">
                    Тестовое
                </a>
                <span class="text-muted">© 2024 Company, Inc</span>
            </div>
        </div>
    </footer>
</body>
</html>
