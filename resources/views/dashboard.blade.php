@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
<div class="w-25 bg-white p-4 border mx-auto mt-4 rounded">
    <p class="m-0">Welcome {{ auth()->user()->name }}</p>
</div>
@endsection
