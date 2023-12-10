@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4"><strong>Contact Us</strong></h2>
    <form method="POST" action="{{ route('contact.submit') }}" class="col-md-6">
        @csrf
        <div class="form-group">
            <label for="username"><strong>Username: </label>
            <input type="text" name="username" class="form-control" value="{{ Auth::user()->name }}" required readonly>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="problem">Problem description:</label>
            <textarea name="problem" rows="4" class="form-control" style="margin-bottom: 10px;" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>

    <h2 class="mt-4"><strong>Previous contact forms</strong></h2>
    @foreach($inquiries as $inquiry)
        <div class="card mb-3">
            <div class="card-body">
            <h5><strong>Title:</strong> {{ $inquiry->title }}</h5>
                <p><strong>Problem:</strong> {{ $inquiry->problem }}</p>

                @if ($inquiry->status == 'pending')
                <div style="color: #FFA500;">
                    <h6 style= class="card-subtitle mb-2 text-success"><strong>Status: pending</strong></h6>
                </div>
                @elseif ($inquiry->status == 'resolved')
                    <p class="card-text">Response: {{ $inquiry->response }}</p>
                    <h6 style="color: #006400;" class="card-subtitle mb-2 text-success"><strong>Status: Resolved</strong></h6>
                @endif
                <form method="POST" action="{{ route('inquiry.user.delete', ['id' => $inquiry->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
        
</div>
    <style>
        body {
            background-image: url('{{ asset('images/medieval_city.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .green{
        }
        html, body {
            height: 100vh;
        }
        
    </style>
@endsection