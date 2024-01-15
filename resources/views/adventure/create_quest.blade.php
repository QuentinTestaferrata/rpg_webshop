@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Quest') }}</div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('quests.create_quest') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Quest Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="reward" class="form-label">{{ __('Reward') }}</label>
                                <input type="number" class="form-control" id="reward" name="reward" required>
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">{{ __('Duration (in minutes)') }}</label>
                                <input type="number" class="form-control" id="duration" name="duration" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">{{ __('Create Quest') }}</button>
                                <a href="{{ route('quests.show') }}" class="btn btn-secondary">Go to Quest Board</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background-image: url('{{ asset('/storage/images/quest.png') }}');
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
