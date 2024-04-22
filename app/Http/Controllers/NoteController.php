<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Notes = Note::orderBy("created_at", "desc")->paginate(12);
        return view("note.index", ['notes' => $Notes])->with("title", "All notes");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return "show " . $note->content;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        return "destroy";
    }
}
