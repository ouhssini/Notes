<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', Auth::id())
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
        
        return view("notes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        if ($image = $request->file('image')) {
            $nomimage = $image->store('images', 'public');
        } else {
            $nomimage = 'images/placeholder.jpg';
        }
        $data['image'] = $nomimage;
        $data['user_id'] = Auth::id();
        Note::create($data);
        Alert::success('Note CREATING', 'Your note has been created successfully');
        return to_route('note.index')->with('success', 'Your note has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        Gate::authorize('canEdit', $note);
        confirmDelete("DELETE NOTE", "ARE YOU SURE YOU WANT TO DELETE THIS NOTE?");
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        Gate::authorize('canEdit', $note);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note)
    {

        Gate::authorize('canEdit', $note);
        $data =  $request->validated();

        if ($image = $request->file('image')) {
            $nomImage =  $request->file('image')->store('images', 'public');
            $data['image'] = $nomImage;
        }
        $note->update($data);
        Alert::success('Note UPDATING', 'Your note has been updated successfully');
        return to_route('note.show', $note->id)->with('success', 'Your note has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Gate::authorize('canEdit', $note);
        $note->delete();
        // $note->forceDelete(); // use forceDelete to delete the note from the database too 
        return redirect()->route('note.index')->with('success', 'your note has been deleted successfully');
        // return to_route('note.index')->with('success','your note has been deleted successfully');
    }

    public function forceDelete($id)
    {
        $note = Note::onlyTrashed()
            ->find($id);
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }
        $note->forceDelete();
        // $note->forceDelete(); // use forceDelete to delete the note from the database too 
        return redirect()->route('note.index')->with('success', 'your note has been deleted Prementely successfully');
    }

    public function deleteAll()
    {
        $user_id = Auth::id();
        $notes = Note::onlyTrashed()->where('user_id', $user_id)->get();
        if ($notes->count() > 0) {
            foreach ($notes as $note) {
                $note->forceDelete();
            }
            return redirect()->route('note.index')->with('success', 'all your trashed notes has been deleted Prementely successfully');
        } else {
            return redirect()->route('note.index')->with('success', 'an error occurred while deleting your notes');
        }
    }


    public function deleted()
    {
        $notes = Note::onlyTrashed()
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view("notes.deleted", compact('notes'));
    }
    public function restore($id)
    {
        $note  = Note::onlyTrashed()->where('id', $id)->firstOrFail();
        $note->restore();
        Alert::success('Note RESTORING', 'Your note has been restored successfully');
        return to_route("note.show", compact('note'))->with('success', 'your note has been restored successfully');
    }
}
