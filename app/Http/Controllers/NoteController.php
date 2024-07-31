<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view("notes.index", compact('notes'));
        // return view("notes.index",['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $users = User::all();
        return view("notes.create");
        // return view("notes.create", ['users' =>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        // $data = $request->validate([
        //     'note' => ['required', ' min:30', 'max:2500 '],
        //     'user_id' => 'required',
        //     'image' => 'image',
        // ]);
        $data = $request->validated();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $nomimage = Str::random(35) . "." . $image->getClientOriginalExtension();
            // Utilisation de Str::random pour générer un nom unique
            $image->move($destinationPath, $nomimage);
            // Assurez-vous d'attribuer le nom d'image avant d'appeler update()
        } else {
            $nomimage = 'placeholder.jpg';
        }
        $data['image'] = $nomimage;
        $data['user_id'] = auth()->user()->id;
        Note::create($data);
        return to_route('note.index')->with('success', 'Your note has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== Auth()->user()->id) {
            abort(403);
        }
        // $note = Note::find($note->id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== Auth()->user()->id) {
            abort(403);
        }
        // $note = Note::find($note->id);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth()->user()->id) {
            abort(403);
        }
        $data =  $request->validate([
            'note' => 'required|min:30 | max:2500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $nomimage = Str::random(35) . "." . $image->getClientOriginalExtension();
            // Utilisation de Str::random pour générer un nom unique
            $image->move($destinationPath, $nomimage);
            // Assurez-vous d'attribuer le nom d'image avant d'appeler update()
            $data['image'] = $nomimage;
        }
        $note->update($data);
        return to_route('note.show', $note->id)->with('success', 'Your note has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth()->user()->id) {
            abort(403);
        }
        $note->delete();
        return redirect()->route('note.index')->with('success', 'your note has been deleted successfully');
        // return to_route('note.index')->with('success','your note has been deleted successfully');
    }


    public function deleted()
    {
        $notes = Note::onlyTrashed()
        ->where('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->paginate(9);
        return view("notes.deleted", compact('notes'));
    }
    public function restore($id){
        $note  = Note::onlyTrashed()->where('id', $id)->firstOrFail();
        $note->restore();

        return to_route("note.show",compact('note'))->with('success', 'your note has been restored successfully');
    }
}
