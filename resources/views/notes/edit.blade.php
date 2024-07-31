@extends('components.layout')


@section('title')
    Edit the Note Number {{ $note->id }}
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

    <form action="{{ route('note.update', $note->id) }}" class="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3">{{ $note->note }}</textarea>
            @error('note')
                <div class="form-text text-danger" id="basic-addon4"> * {{ $message }}</div>
            @enderror
        </div>
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    </div>
                </div>
                <div class="col text-end">
                    <div class="image-fluid">
                        <img src="/images/{{ $note->image }}" class="border-1 border border-black" alt="{{ Str::limit($note->note, 50) }}" style="width: 300px">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection
