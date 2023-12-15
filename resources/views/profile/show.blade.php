@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <div >
                            <div class="profile-picture">
                                @if($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="50" height="50">
                                @else
                                    <img src="{{ asset('storage/profile_pictures/default.png') }}" alt="Profile Picture" width="50" height="50">
                                @endif                            </div>{{ $user->name }}'s Profile
                        </div>
                        @if(Auth::user() && Auth::user()->id === $user->id)
                            <a href="{{ route('profile.edit_profile', ['user' => $user]) }}" class="btn btn-primary float-end">Edit</a>
                        @endif                    
                    </div>

                    <div class="card-body">
                        <form id="profileForm" action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="file" id="profilePictureInput" name="profile_picture" accept="image/*" style="display: none;">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->name }}" readonly>
                            </div>
                            @if(Auth::user() && Auth::user()->id === $user->id)
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday:</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="aboutme" class="form-label">About me:</label>
                                <input type="text" class="form-control" id="aboutme" name="aboutme" value="{{ $user->aboutme }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <style>
        .profile-picture {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto;
            margin-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
            border: 1px solid #0f0f0f;

        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #profilePictureInput {
            display: none;
        }
        body {
            background-image: url('{{ asset('storage/images/profilepicture.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        html, body {
            height: 100%;
    }
    </style>
@endsection
