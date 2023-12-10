@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 10px;">
            <h2>Quest board</h2>
            <div>
            <a href="{{ route('my_quests.show') }}" class="btn btn-secondary">Go to your quests</a>
            @if(Auth::user()->role=='admin')
            <a href="{{ route('quest.create') }}" class="btn btn-primary">Create new quest</a>
            @endif
            </div>
            

        </div>

        <div class="row">
            @foreach ($quests as $quest)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header"><strong>{{ $quest->name }}</strong></div>
                        <div class="card-body">
                            <p>Description: {{ $quest->description }}</p>
                            <p>Quest duration: {{ $quest->duration }} minutes</p>
                            <p><strong>Reward: {{ $quest->reward }}$</strong></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('quests.accept', ['id' => $quest->id]) }}" class="btn btn-primary">Accept Quest</a>
                                @if(Auth::user()->role=='admin')
                                <form method="POST" action="{{ route('quests.delete', ['id' => $quest->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
