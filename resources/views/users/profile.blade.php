@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    Profile of {{$user->name}}
                    {{-- check if authenticated user is the same user as profiel  --}}
                    @if (Auth::user()->id == $user->id)
                    <a href="{{route('users.edit', Auth::user()->id)}} ">
                        Edit profile
                    </a>
                    @endif
                    
                </div>

                <div class="card-body">
                   {{-- load user data --}}
                    <h2>Profile picture</h2>
                    @if ($user->avatar != NULL)
                        <img src="{{asset($user->avatar)}}" alt="profile picture" width="250" height="250">
                    @else
                    <img src="{{asset('avatars/default_avatar.png')}}" alt="profile picture" width="250" height="250">
                    @endif
                    
                    <h2>Bio</h2>
                    <p>{{$user->bio}}</p>
                    <h2>Birthdate</h2>
                    <p>{{$user->birthday}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
