<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Notes = Note::where('user_id', Auth::id())->orderBy("created_at", "desc")->paginate(12);
        return view("notes.index", ['notes' => $Notes])->with("title", "All notes");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("notes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['nullable', 'string'],
            'content' => ['required', 'string']
        ]);
        // dd($validatedData);
        $validatedData['user_id'] = Auth::id();
        $note = Note::create($validatedData);
        // dd($note);
        return to_route("notes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            abort('403');
        }
        // return "show " . $note->content;
        return to_route('notes.edit', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            abort('403');
        }
        return view("notes.edit", ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            abort('403');
        }

        $validatedData = $request->validate([
            'title' => ['nullable', 'string'],
            'content' => ['required', 'string'],
        ]);
        // dd($validatedData);
        $note->update($validatedData);
        return to_route("notes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            abort('403');
        }
        $note->delete();
        return to_route('notes.index');
    }
}
