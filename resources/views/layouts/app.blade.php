<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/bd23464167.js" crossorigin="anonymous"></script>
    @yield('style')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Stapla</title>
</head>

<body>
    <!-- header -->

    <header class="navbar navbar-dark bg-dark">
        <nav class="container px-2 ">
            <h1>
                <a class="navbar-brand" href="/logs">Stapla</a>
            </h1>

            <div class="header-right">
                <div class="header-icon rounded-circle d-inline-block">

                    @if (Auth::check())
                    <a class="d-block" href="{{ route('logout') }}">
                        <img class="header-img rounded-circle" src="{{ Auth::user()->image }}" alt="">
                    </a>
                    @endif

                </div>
                <a href="{{ action('LogController@create') }}" class="btn btn-outline-light btn-sm ml-2">
                    <span class="d-none d-md-inline mr-1">勉強を記録する</span>
                    <i class="fas fa-pen"></i>
                </a>
            </div>

        </nav>
    </header>

    <!-- end header -->

    <div class="container-md logs-bg">
        <div class="py-4">
            @yield('content')
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <!-- Optional JavaScript -->
    @yield('script')
</body>

</html>