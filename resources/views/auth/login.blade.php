<x-layout>
    <div class="text-white flex justify-center container mx-auto mt-8 max-w-[64rem] px-5">
        @session('message')
            <p class="p-2 text-center bg-red-500 text-white text-xl">{{ session('message') }}</p>
        @endsession
    </div>
    <div class="container mx-auto  mt-8 max-w-[64rem] px-5">

        <form
            class=" mx-auto overflow-hidden grid grid-cols-1 gap-2 md:grid-cols-[1fr_2fr] bg-slate-600/75 px-3 py-5 rounded-md max-w-xl md:py-10"
            action="{{ route('loginPost') }}" method="POST">
            @csrf

            <h4 class="px-6 py-4 col-span-2 text-3xl text-neutral-300">Login to your account</h4>

            <label class="text-white md:justify-self-center" for="username">Username</label>
            <input placeholder="your username..." class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm"
                type="text" name="username" id="username">

            <label class="text-white md:justify-self-center mt-5 md:mt-0 inline-block" for="email">Email</label>
            <input placeholder="your email..." class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm"
                type="email" name="email" id="email">

            <label class="text-white md:justify-self-center mt-5 md:mt-0 inline-block" for="password">Password</label>
            <input placeholder="your password..."
                class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm" type="password" name="password"
                id="password">

            <button class="btn btn-negative my-6 md:-mb-2 md:mt-2 md:col-span-2 md:justify-self-center"
                type="submit">Login</button>

            <h2 class="text-center mt-8 col-span-2 text-neutral-300">
                Don't have an account? <a class="text-blue-300 p-0 hover:text-green-400 underline underline-offset-3"
                    href="{{ route('registerForm') }}">Signup</a> for free!
            </h2>
        </form>
    </div>

</x-layout>
