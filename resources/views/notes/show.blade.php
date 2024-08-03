@extends('components.layout')
@section('title')
    Note Number {{ $note->id }}
@endsection


@section('main')
    @if (session()->has('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif
    @if ($note)
        <div class="alert alert-light row" role="alert">
            <div class="col">
                {{ $note->note }}
            </div>
            <div class="col">
                <img src="{{ asset('storage/' . $note->image) }}" class="" alt="{{ Str::limit($note->note, 50) }}">
            </div>
        </div>
        <div class="row">
            <form class="col-1" action="{{ route('note.destroy', $note) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"> Delete</button>
            </form>
            <form class="col" action="{{ route('note.edit', $note) }}" method="get">
                @csrf
                <button type="submit" class="btn btn-success"> Modifier</button>
            </form>
        </div>
    @endif
@endsection
