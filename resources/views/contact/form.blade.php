@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4"><strong>Contact Us</strong></h2>
    <form method="POST" action="{{ route('contact.submit') }}" class="col-md-6">
        @csrf
        <div class="form-group">
            <label for="username"><strong>Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="problem">Problem:</label>
            <textarea name="problem" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <style>
        body {
            background-image: url('{{ asset('images/medieval_city.png') }}');
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