<x-layout>
    <div class="container mx-auto my-5 max-w-[64rem]">
        <a href="{{ route('notes.create') }}">Create Note</a>
    </div>
    <div
        class="container mx-auto grid max-w-[64rem] justify-items-center grid-cols-1  sm:grid-cols-2 md:grid-cols-3 gap-12">
        @foreach ($notes as $note)
            <div class="card">
                <h5 class=" p-1 border-b-2 border-slate-600/50 mb-3 text-xl card-title">{{ $note->title }}</h5>
                {{-- <p class="card-text h-36 truncate-ellipses">{{ Str::words($note->content, 30) }}</p> --}}
                <p class="card-text mb-7">{{ Str::limit($note->content, 197) }}</p>
                <div class="mt-auto flex justify-end gap-5">
                    <a href="{{ route('notes.edit', $note) }}" class="card-link">Edit note</a>
                    <a href="{{ route('notes.destroy', $note) }}" class="card-link">Delete note</a>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
