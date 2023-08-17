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
                        <h3>{{$article->title}}</h2>
                        <div>
                            <p>{{$article->message}}</p>
                            @if($article->image != NULL)
                                <img src="{{asset($article->image)}}" alt="article picture" width="300" height="250">
                            @else
                                <img src="{{asset("images/default_image.jpg")}}" alt="article picture" width="300" height="250">
                            @endif
                        </div>
                        
                        <small>Published at <i>{{$article->created_at->format('H:i d/m/Y ')}}</i></small>
                        {{-- TODO make foradmin only --}}
                        @auth
                            @if (Auth::user()->is_admin)
                                <a href="{{route('articles.edit', $article->id)}} ">
                                    Edit Article
                                </a>
                                <form  method="post" action="{{route('articles.destroy', $article->id)}} " >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="DELETE ARTICLE" class="text-danger" onclick="return confirm('Are you sure you want to delete this article')">
                                </form>
                            @endif
                        @endauth
                        <hr>

                       
                    @endforeach
                    
                    {!! $articles->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
