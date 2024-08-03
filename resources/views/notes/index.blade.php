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
    </div>
    @if (isset($notes) && !empty($notes))
        @unless (count($notes) <= 0)
            <div class="row gap-2 justify-content-center">
                @foreach ($notes as $note)
                    <div class="card col-md-3 ">
                        <img src="{{ asset('storage/' . $note->image) }}" class="card-img-top" alt="{{ Str::limit($note->note, 50) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->id }}</h5>
                            <p class="card-text">{{ Str::limit($note->note, 100) }}</p>
                            <a href="{{ route('note.show', $note) }}" class="stretched-link "></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-2">
                {{ $notes->links() }}
            </div>
        @else
            <h3 class="text-center text-primary mt-5 text-uppercase w-50 mx-auto lh-lg fw-bolder"> THERE IS NO NOTES TO DISPLAY CREATE NEW ONE TO SEE IT HERE
            </h3>
        @endunless
    @else
        <h3 class="text-center text-primary mt-5 text-uppercase w-50 mx-auto lh-lg fw-bolder"> THERE IS NO NOTES TO DISPLAY CREATE NEW ONE TO SEE IT HERE
        </h3>
    @endif

@endsection
