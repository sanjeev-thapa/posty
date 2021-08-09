@extends('layouts.app')

@section('title') Register @endsection

@section('content')
<div class="w-50-lg bg-white p-4 border mx-auto mt-4 rounded">
    <form method="post" class="mb-0">
        @csrf

        @if(session('status'))
        <div class="alert alert-danger">{{ session('status') }}</div>
        @endif

        <div class="form-group">
            <input type="text" name="username" value="{{ old('username') }}"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('username') is-invalid @enderror"
                placeholder="Username">
            @error('username') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('password') is-invalid @enderror"
                placeholder="Password">
            @error('password') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div>
            <input type="checkbox" class="mr-1" name="remember" id="checkbox">
            <label for="checkbox">Remember Me</label>
        </div>

        <button class="btn btn-primary py-2 btn-block">Login</button>
    </form>
    @endsection
</div>
