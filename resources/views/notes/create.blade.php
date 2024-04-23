<x-layout>
    <div class="container mx-auto mt-8 max-w-[64rem] px-5">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="card hover:translate-y-0 space-y-3">
                <input type="text" name="title"
                    class="px-1 py-1.5 bg-inherit outline-none w-full placeholder:italic placeholder:text-gray-500/75 text-xl border-b-2 border-black"
                    rows="1" placeholder="Title..." id=""></input>
                <textarea name="content"
                    class="px-1 py-1.5 bg-inherit outline-none w-full placeholder:italic placeholder:text-gray-500/75 text-xl"
                    rows="12" placeholder="Your note..." id=""></textarea>
            </div>
            <div class="py-5 flex gap-4 justify-end">
                <button class="btn btn-positive" type="submit">Save</button>
                <a class="btn btn-negative " href="{{ route('notes.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
