@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Question') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf

                            <div>
                            <label class="my-1 mr-2" for="cat_id">Category</label>
                            <select class="custom-select" id="cat_id" name="cat_id" required>
                            {{-- for all categoryies we will make a option tag with linked id and name --}}
                            @for ($i = 0; $i < count($categories); $i++)
                                @if ($i == 1)
                                <option value="{{ $categories[$i]->id }}" selected>{{ $categories[$i]->name}}</option>
                                @else
                                <option value="{{ $categories[$i]->id }}">{{ $categories[$i]->name}}</option>
                                @endif
                                
                            @endfor
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Question</label>
                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required  autofocus>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="answer" class="col-md-4 col-form-label text-md-end">Answer</label>

                            <div class="col-md-6">
                                <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required  autofocus>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
