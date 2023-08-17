@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>

                    
                    @foreach ($users as $user)
                    @if (!$user->is_admin)
                    <li>
                        <div class="d-flex">
                            <p>{{$user->name}}</p>
                            <a class="px-2" href="{{route('users.edit', $user->id)}}">edit user power</a>
                            
                        </div>
                    </li>
                    @endif

                    @endforeach
                    </ul>
                    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection