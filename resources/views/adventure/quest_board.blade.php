@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h2>Adventures</h2>

        <p style="font-size: 1.2em;"><strong>Title:</strong> a</p>
        <p style="font-size: 1.2em;"><strong>Problem:</strong> a</p>

        
    </div>
    <style>
        body {
            background-image: url('{{ asset('images/adventure.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        html, body {
            height: 100vh;
        }
    </style>
@endsection
