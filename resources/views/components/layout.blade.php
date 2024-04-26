<!doctype html>
<html lang="en" class="dark">

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
        class="z-50  py-4 px-7 text-base md:text-lg lg:text-xl xl:text-2xl bg-rose-800 text-white shadow-lg sticky top-0 mb-2 bg-opacity-85">
        <ul class="flex flex-row gap-5">
            <li><a href="{{ route('notes.index') }}">NOTES</a></li>
            @auth
                {{-- <li><a href="{{ route('notes.index') }}">Home</a></li> --}}
                <li><a href="{{ route('logout') }}">Logout</a></li>
                <li class="ml-auto">
                    <a class=""
                        href="{{ route('user.edit') }}">{{ auth()->user()->username ? auth()->user()->username : 'Profile' }}
                    </a>
                </li>
                @elseguest
                <li><a href="{{ route('registerForm') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            @endauth


        </ul>
    </nav>

    <div>
        {{ $slot }}
    </div>
</body>

</html>
