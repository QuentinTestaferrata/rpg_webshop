@extends('layouts.app')

@section('content')
<div class="container mt-3 text-white ml-1">
    <h1>Search Results: </h1>
    <p></p>
    <!--<h1>for "{{ $query }}"</h1> -->
    @foreach($users as $user)
        <div class="mb-3">
            <button class="btn btn-primary ml-1" onclick="window.location='{{ route('profile.show', $user->id) }}'">
                {{ $user->name }}
            </button>
        </div>
    @endforeach
</div>
<style>
    body {
        background-image: url('{{ asset('storage/images/nightvillage.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    html, body {
        height: 100%;
    }
</style>
@endsection
