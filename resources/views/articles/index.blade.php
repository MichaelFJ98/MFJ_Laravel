@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach ($articles as $article)
                        <h1>{{$article->title}}</h1>
                        <p>{{$article->message}}</p>
                        <small>Published at <i>{{$article->created_at}}</i></small>
                        <hr>
                    @endforeach
                    
                    {!! $articles->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
