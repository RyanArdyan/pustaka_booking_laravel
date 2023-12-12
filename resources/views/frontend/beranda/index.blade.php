<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pustaka Buku Beranda</title>
    <link href="{{ asset('bootstrap-5.3.2') }}/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Hello, world!</h1>

    {{-- jika ada rute login --}}
    @if (Route::has('login'))
        <div>
            {{-- jika user sudah login --}}
            @auth
            {{-- jika di click maka panggil url dashboard --}}
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            {{-- jika belum login --}}
            @else
            {{-- jika di click maka panggil rute yang bernama login --}}
                <a href="{{ route('login') }}">Login</a>

                {{-- jika memiliki rute register --}}
                @if (Route::has('register'))
                {{-- jika di click maka panggil rute yang bernama register --}}
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <button class="btn btn-danger">button</button>
    <script src="{{ asset('bootstrap-5.3.2') }}/js/bootstrap.bundle.min.js"></script>
</body>

</html>
