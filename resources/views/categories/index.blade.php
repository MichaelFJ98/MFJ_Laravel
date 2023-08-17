@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Q&A</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach ($categories as $category)
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <h2>{{$category->name}}</h2>
                            
                            
                            @auth
                            @if (Auth::user()->is_admin)
                            <a href="{{route('categories.edit', $category->id)}}">
                                Edit Category
                            </a>

                            <form  method="post" action="{{route('categories.destroy', $category->id)}} " >
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="DELETE CATEGORY" class="text-danger" onclick="return confirm('Are you sure you want to delete this category')">
                            </form>
                            @endif
                            @endauth
                            
                            @if ($category->questions())
                              
                              @foreach ($category->questions()->get() as $question)
                              <div class="accordion-item ">
                                
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    {{$question->question}}
                            
                                  </button>
                                </h2>
                                
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                  <div class="accordion-body">
                                    <p>{{$question->answer}}</p>
                                    @auth
                                      
                                    @if (Auth::user()->is_admin)
                                      
                                    
                                    <a href="{{route('questions.edit', $question->id)}}" >Edit question</a>
                                    <form  method="post" action="{{route('questions.destroy', $question->id)}} " >
                                      @csrf
                                      @method('DELETE')
                                      <input type="submit" value="DELETE QUESTION" class="text-danger" onclick="return confirm('Are you sure you want to delete this question')">
                                      
                                    </form>
                                    @endif
                                    @endauth
                                  </div>
                                </div>
                              </div>
                              @endforeach
                            @endif
                            
                            
                          </div>

                    @endforeach
                    
                    {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection