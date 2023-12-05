@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Admin Inquiries</h2>

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
                                <textarea name="response" rows="2" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Respond</button>
                        </form>
                    @elseif ($inquiry->status == 'resolved')
                        <h6 class="card-subtitle mb-2 text-success">Resolved</h6>
                        <p class="card-text">Response: {{ $inquiry->response }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

   
@endsection
