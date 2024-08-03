@extends('components.layout')
@section('title')
    All Notes
@endsection

@section('main')
    @if (session()->has('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif
    <div class="addnew my-4 text-end me-5">
        <a href="{{ route('note.create') }}" class="btn btn-success"> Add New Note</a>
       <form action="{{ route('note.deleteAll') }} " method="post" class="my-3">
        @csrf
        <button  type="submit" class="btn btn-danger"> Delete All</button>
       </form>
    </div>
    @if (isset($notes) && !empty($notes))
        @unless (count($notes) <= 0)
            <div class="row gap-2 justify-content-center">
                @foreach ($notes as $note)
                    <div class="card col-md-3 px-0">
                        <img src="{{ asset('storage/' . $note->image) }}" class="card-img-top"
                            alt="{{ Str::limit($note->note, 50) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->id }}</h5>
                            <p class="card-text">{{ Str::limit($note->note, 100) }}</p>
                        </div>
                        <div class="card-footer row mx-0 px-0 gap-3" style="z-index:9 ">
                            <form action="{{ route('note.restore', $note->id) }}" method="POST" class="col-3">
                                @csrf
                                <button type="submit" class="btn btn-warning">Restore</button>
                            </form>
                            <form action="{{ route('note.forcedelete', $note->id) }}" method="post" class="col-8">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete Premantely</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-2">
                {{ $notes->links() }}
            </div>
        @else
            <h3 class="text-center text-warning mt-5 text-uppercase w-50 mx-auto lh-lg fw-bolder"> YOU DIDN'T DELETE ANY NOTE
            </h3>
        @endunless
    @else
        <h3 class="text-center text-warning mt-5 text-uppercase w-50 mx-auto lh-lg fw-bolder"> YOU DIDN'T DELETE ANY NOTE
        </h3>
    @endif

@endsection
