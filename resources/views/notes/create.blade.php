@extends('components.layout')


@section('title')
    Add New Note
@endsection


@section('main')
    @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form action="{{ route('note.store') }}" class="form w-50 mx-auto px-4 py-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="form-text text-danger"> * {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3">{{ old('note') }}</textarea>
            @error('note')
                <div class="form-text text-danger"> * {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
            @error('image')
                <div class="form-text text-danger"> * {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
@endsection
