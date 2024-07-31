@extends('components.layout')

@section('title')
    LOGIN
@endsection


@section('main')
    <div class="w-50 mx-auto my-0">
        @error('failed')
            <x-alert type="danger">
                {{ $message }}
            </x-alert>
        @enderror
    </div>
    <form action="{{ route('login') }}" method="POST" class="container w-50 mt-2 bg-dark-subtle px-4 py-5 rounded">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            <div class="form-text text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div class="form-text text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <button type="submit" class="btn btn-success px-3">Login</button>
    </form>
@endsection
