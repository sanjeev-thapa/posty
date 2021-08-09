@extends('layouts.app')

@section('title') Register @endsection

@section('content')
<div class="w-50-lg bg-white p-4 border mx-auto mt-4 rounded">
    <form method="post" class="mb-0">
        @csrf

        <div class="form-group mb-3">
            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('name') is-invalid @enderror"
                placeholder="Your Name">
            @error('name') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="username" value="{{ old('username') }}"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('username') is-invalid @enderror"
                placeholder="Username">
            @error('username') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="email" value="{{ old('email') }}"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('email') is-invalid @enderror"
                placeholder="Your Email">
            @error('email') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('password') is-invalid @enderror"
                placeholder="Password">
            @error('password') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation"
                class="form-control focus-primary px-3 py-4 bg-light border-2 @error('password_confirmation') is-invalid @enderror"
                placeholder="Confirm Password">
            @error('password_confirmation') <span class="invalid-feedback"> {{ $message }} </span> @enderror
        </div>

        <button class="btn btn-primary py-2 btn-block">Register</button>
    </form>
    @endsection
</div>
