<x-layout>
    <div class="text-white  flex justify-center container mx-auto mt-8 max-w-[64rem] px-5">
        @session('message')
            <p class="rounded p-2 text-center bg-red-500 text-white text-xl">{{ session('message') }}</p>
        @endsession
    </div>
    <div class="container mx-auto  mt-8 max-w-[64rem] px-5">

        <form
            class=" mx-auto overflow-hidden grid grid-cols-1 gap-2 md:grid-cols-[1fr_2fr] bg-slate-600/75 px-3 py-5 rounded-md max-w-xl md:py-10"
            action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h4 class="px-6 py-4 md:col-span-2 text-3xl text-neutral-300">Edit your account details</h4>

            <label class="text-white md:justify-self-center" for="username">Username</label>
            <input placeholder="your username..." class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm"
                value="{{ $user->username }}" type="text" name="username" id="username">
            <label class="text-white md:justify-self-center mt-5 md:mt-0 inline-block" for="email">Email</label>
            <input placeholder="your email..." class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm"
                value="{{ $user->email }}" type="email" name="email" id="email">

            <label class="text-white md:justify-self-center mt-5 md:mt-0 inline-block" for="password">New
                Password</label>
            <input placeholder="New password..." class="placeholder:italic placeholder:text-sm px-1.5 py-0.5 rounded-sm"
                type="password" name="password" id="password">

            <button class="btn btn-positive my-6 md:-mb-2 md:mt-2 md:col-span-2 md:justify-self-center"
                type="submit">Update</button>
        </form>
        <form class="flex justify-center" action="{{ route('user.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger my-6 md:-mb-2 md:mt-2 md:col-span-2 md:justify-self-center"
                type="submit">Delete Account</button>
        </form>


    </div>

</x-layout>
