@extends('layouts.app')

@section('title') Post @endsection

@section('content')
<div class="w-75-lg bg-white px-4 pb-3 border mx-auto mt-4 rounded">
    <x-post :post="$post" />
</div>
@endsection
