@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <h2>Your Inquiry has been sent to the administrators!</h2>

        <p style="font-size: 1.2em;"><strong>Title:</strong> {{ $inquiry->title }}</p>
        <p style="font-size: 1.2em;"><strong>Problem:</strong> {{ $inquiry->problem }}</p>

        @if ($inquiry->response)
            <h3>Response:</h3>
            <p>{{ $inquiry->response }}</p>
        @endif
    </div>
    <style>
        body {
            background-image: url('{{ asset('storage/images/messenger_owl.png') }}');
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
