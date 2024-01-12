@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contact Panel</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <h3>Waiting for Answers</h3>
        @foreach($inquiries as $inquiry)
            @if ($inquiry->status == 'pending')
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $inquiry->title }} - from: {{ $inquiry->username }}</strong></h5>
                        <p class="card-text">{{ $inquiry->problem }}</p>
                        <div style="color: #FFA500;">
                            <h6 style= class="card-subtitle mb-2 text-success"><strong>Status: pending</strong></h6>
                        </div>
                        <form method="POST" action="{{ route('admin.inquiries.respond', $inquiry->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="response">Response:</label>
                                <textarea name="response" rows="2" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Respond</button>
                        </form>
                        <form method="POST" action="{{ route('inquiry.delete', $inquiry->id) }}" style="margin-top: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="mb-4">
        <h3>Answered</h3>
        @foreach($inquiries as $inquiry)
            @if ($inquiry->status == 'resolved')
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $inquiry->title }} - from: {{ $inquiry->username }}</strong></h5>
                        <p class="card-text">{{ $inquiry->problem }}</p>
                        <h6 class="card-subtitle mb-2 text-success"><strong>Resolved</strong></h6>
                        <p class="card-text"><strong>Response:</strong> {{ $inquiry->response }}</p>
                        <form method="POST" action="{{ route('inquiry.delete', $inquiry->id) }}" style="margin-top: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

    <style>
    body {
        background-image: url('{{ asset('storage/images/medieval_city.png') }}');
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
