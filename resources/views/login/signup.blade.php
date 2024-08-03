@extends('components.layout')

@section('title')
    Create Profile
@endsection


@section('main')
    <div class="w-50 mx-auto my-0">
        @error('failed')
            <x-alert type="danger">
                {{ $message }}
            </x-alert>
        @enderror
    </div>
    <form action="{{ route('signup') }}" method="POST" class="container w-50 mt-2 bg-dark-subtle px-4 py-5 rounded">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            <div class="form-text text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
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
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-success px-3">Sign up</button>
    </form>
@endsection
