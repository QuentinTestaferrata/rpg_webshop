@extends('layouts.app')

@section('content')
    <div class="container" style="color: white;">

        
        <div class="active-quests">
            <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 10px;">
                <h3>Active Quests</h3>
                <a href="{{ route('quests.show') }}" class="btn btn-secondary">Go to Quest Board</a>
            </div>
            @forelse($activeQuests as $quest)
                <div class="card mb-3">
                    <div class="card-body quest-item">
                        <strong>{{ $quest->name }}</strong> - {{ $quest->description }}
                        @if(!$quest->rewarded && !$quest->isClaimable())
                            <p style="color: red;">Claimable in: {{ now()->diff($quest->updated_at->addMinutes($quest->duration))->format('%H hours %I minutes %S seconds') }}</p>
                        @endif
                        @if(!$quest->rewarded && $quest->isClaimable())
                            <form method="POST" action="{{ route('quests.claim', ['id' => $quest->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Claim {{ $quest->reward }}$</button>
                            </form>
                        @endif
                        
                    </div>
                </div>
            @empty
                <p>No active quests at the moment.</p>
            @endforelse
        </div>

        <hr>

        <div class="completed-quests">
            <h3>Completed Quests</h3>
            @forelse($completedQuests as $quest)
                <div class="card mb-3">
                    <div class="card-body quest-item">
                        <strong>{{ $quest->name }}</strong> - {{ $quest->description }}
                        <strong style="color: darkgreen;">Rewarded: {{ $quest->reward }}$</strong>
                    </div>
                </div>
            @empty
                <p>No completed quests yet.</p>
            @endforelse
        </div>

    </div>

    <style>
        body {
            background-image: url('{{ asset('/storage/images/adventure.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        html, body {
            height: 100vh;
        }

        .active-quests, .completed-quests {
            margin-bottom: 20px;
        }

        .quest-item {
            margin-bottom: 10px;
        }
    </style>
@endsection
