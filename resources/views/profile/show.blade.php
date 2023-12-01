@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <label for="profilePictureInput">
                            <div class="profile-picture">
                                <img id="profilePicturePreview" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : '' }}" alt="Profile Picture">
                            </div>
                        </label>
                        {{ $user->name }}'s Profile
                        <button class="btn btn-primary float-end" id="editProfileBtn">Edit</button>
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
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                            
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday:</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="aboutme" class="form-label">About me:</label>
                                <input type="text" class="form-control" id="aboutme" name="aboutme" value="{{ $user->aboutme }}" readonly>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success" style="display: none;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('editProfileBtn').addEventListener('click', function (event) 
        {
            event.preventDefault();

            document.querySelectorAll('#profileForm input').forEach(function (input) {
                input.removeAttribute('readonly');
            });
            document.querySelector('#profileForm button').style.display = 'block';
        });

        document.getElementById('profilePictureInput').addEventListener('change', 
        function () 
        {
            const fileInput = this;
            const profilePicturePreview = document.getElementById('profilePicturePreview');
            profilePicturePreview.src = URL.createObjectURL(fileInput.files[0]);
        });

        document.getElementById('profileForm').addEventListener('submit', function (event) 
        {
            event.preventDefault();

            fetch(this.action,
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': this.querySelector('input[name="_token"]').value,
                },
                body: new FormData(this),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

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
