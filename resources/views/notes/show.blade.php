@extends('components.layout')
@section('title')
    {{ $note->title }}
@endsection


@section('main')
    @if (session()->has('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif
    @if ($note)
        <div class="container">
            <div class="title display-5 text-primary">{{ $note->title }}</div>
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <div class="  my-4">
                        <p class="lh-lg text-wrap">{{ $note->note }}</p>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <img src="{{ asset('storage/' . $note->image) }}" style="max-width: 70% " alt="{{ $note->title }}">
                </div>
            </div>
            <div class="row">
                {{-- <form class="col-1" action="{{ route('note.destroy', $note->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" data-confirm-delete="true"> Delete</button>
                </form> --}}
                <div class="col-1"> <a href="{{ route('note.destroy', $note->id) }}" class="btn btn-danger"
                        data-confirm-delete="true">Delete</a>
                </div>
                <form class="col text-start" action="{{ route('note.edit', $note) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-success"> Modifier</button>
                </form>
            </div>
        </div>
    @endif
@endsection
