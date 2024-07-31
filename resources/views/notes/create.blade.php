@extends('components.layout')


@section('title')
Add New Note
@endsection


@section('main')

@if($errors->any())
<x-alert type="danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</x-alert>
@endif

<form action="{{route('note.store')}}" class="form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea class="form-control" id="note" name="note" rows="3">{{old('note')}}</textarea>
        @error('note')
        <div class="form-text text-danger" id="basic-addon4"> * {{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
        @error('image')
        <div class="form-text text-danger" id="basic-addon4"> * {{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>


@endsection