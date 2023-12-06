@extends('layouts.app')

@section('content')
    <h2>Search Results for "{{ $query }}"</h2>

    @foreach($users as $user)
        <div class="mb-3">
            <button class="btn btn-primary" onclick="window.location='{{ route('profile.show', $user->id) }}'">
                {{ $user->name }}
            </button>
        </div>
    @endforeach
@endsection