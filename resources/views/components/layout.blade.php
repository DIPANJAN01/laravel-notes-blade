<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>
        @if (isset($title))
            <p>{{ $title }}</p>
        @else
            <p>Welcome</p>
        @endif
    </title>
</head>

<body class="antialiased">


    <nav
        class="z-50 flex flex-row gap-5 py-4 px-7 text-xl bg-rose-800 text-white shadow-lg sticky top-0 mb-2 opacity-85">
        <div><a href="{{ route('notes.index') }}">NOTES</a></div>
        <div><a href="{{ route('notes.index') }}">Home</a></div>
        <div><a href="#">Register</a></div>
        <div><a href="#">Login</a></div>
        <div><a href="#">Logout</a></div>

    </nav>

    <div>
        {{ $slot }}
    </div>
</body>

</html>
