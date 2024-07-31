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
                    <div class="card col-md-3 px-0">
                        <img src="../images/{{ $note->image }}" class="card-img-top" alt="{{ Str::limit($note->note, 50) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->id }}</h5>
                            <p class="card-text">{{ Str::limit($note->note, 100) }}</p>
                        </div>
                        <div class="card-footer " style="z-index:9 ">
                            <form action="{{ route('note.restore',$note->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Restore</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-2">
                {{ $notes->links() }}
            </div>
        @else
            there is no notes to display
        @endunless
    @else
        there is no notes to display
    @endif

@endsection
