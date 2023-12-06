@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Contact Panel</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach($inquiries as $inquiry)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $inquiry->title }} - from: {{ $inquiry->username }}</h5>
                    <p class="card-text">{{ $inquiry->problem }}</p>

                    @if ($inquiry->status == 'pending')
                        <form method="POST" action="{{ route('admin.inquiries.respond', ['id' => $inquiry->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="response">Response:</label>
                                <textarea name="response" rows="2" class="form-control" style="margin-bottom: 10px;" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Respond</button>
                        </form>
                    @elseif ($inquiry->status == 'resolved')
                        <h6 class="card-subtitle mb-2 text-success">Resolved</h6>
                        <p class="card-text">Response: {{ $inquiry->response }}</p>
                    @endif
                    <form method="POST" style="margin-top: 10px;" action="{{ route('inquiry.delete', ['id' => $inquiry->id]) }}">
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
    html, body {
        height: 100vh;
    }
</style>
@endsection
