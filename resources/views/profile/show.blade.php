@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <div >
                            <div class="profile-picture">
                                <img id="profilePicturePreview" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : '' }}" >
                            </div>{{ $user->name }}'s Profile
                        </div>

                        
                        @if(Auth::user() && $user->id === Auth::user()->id)
                            <a href="{{ route('profile.edit_profile', ['user' => $user]) }}" class="btn btn-primary float-end">Edit</a>
                        @endif
                        @if(Auth::user()->role=='admin')
                            <form method="POST" action="{{ route('profile.make_admin', ['user' => $user]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary float-end">Make Admin</button>
                            </form>
                        @endif
                        @if(Auth::user()->role=='admin')
                            <form method="POST" action="{{ route('profile.delete_user', ['user' => $user]) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-end">Delete User</button>
                            </form>
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
                            @if(Auth::user() && $user->id === Auth::user()->id)
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
            width: 150px;
            height: 150px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto;
            margin-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
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
            background-image: url('{{ asset('images/profilepicture.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        html, body {
            height: 100%;
    }
    </style>
@endsection
