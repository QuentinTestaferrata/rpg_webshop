@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Profile Picture</th>
                    <th>Username</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
                <tr>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="50" height="50">
                            @else
                                <!--mss default foto adden-->
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if(Auth::user()->role=='admin' && $user->role != 'admin')
                                <form method="POST" action="{{ route('profile.delete_user_from_list', ['user' => $user]) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete User</button>
                                </form>
                            @elseif(Auth::user()->role=='admin' && $user->role == 'admin' && $user->id != Auth::user()->id)
                                <form method="POST" action="{{ route('profile.make_user', ['user' => $user]) }}" onsubmit="return confirm('Are you sure you want to remove admin role from this user?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">Remove Admin Role</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if($user->role != 'admin')
                                <form method="POST" action="{{ route('profile.make_admin', ['user' => $user]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Make Admin</button>
                                </form> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
@endsection
