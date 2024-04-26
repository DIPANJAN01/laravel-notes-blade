<x-layout>
    <div class="container mx-auto mt-8 max-w-[64rem] px-5 flex justify-end">
        <a class="btn btn-blue" href="{{ route('notes.create') }}">New Note</a>
    </div>
    <div
        class="container px-5 py-5 mx-auto grid max-w-[64rem] justify-items-center grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3 lg:gap-12">
        @if (count($notes) === 0)
            <h3 class="text-center mt-20 col-span-3 italic text-neutral-400 text-4xl">Add your first note!</h3>
        @endif

        @foreach ($notes as $note)
            <div class="card w-80 break-words">
                <h5 class=" p-1 border-b-2 border-slate-600/50 mb-3 text-xl card-title">
                    @if ($note->title)
                        {{ $note->title }}
                    @else
                        &nbsp;
                    @endif
                </h5>
                {{-- <p class="card-text h-36 truncate-ellipses">{{ Str::words($note->content, 30) }}</p> --}}

                <p class="mb-7">{{ Str::limit($note->content, 197) }}</p>

                <div class="mt-auto flex justify-end gap-5">
                    <a href="{{ route('notes.edit', $note) }}" class="btn btn-blue">Edit note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete note
                        </button>
                        {{-- <a href="{{ route('notes.destroy', $note) }}" class="card-link link-delete">Delete note</a> --}}
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
