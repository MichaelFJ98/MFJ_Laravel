@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact Forms</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- display all filled in contactforms --}}
                    @foreach ($contactForms as $form)
                        <h3>{{$form->name}}</h3>
                        <h4>{{$form->email}}</h4>
                        <p>{{$form->message}}</p>
                        <small>Created at <i>{{$form->created_at->format('H:i d/m/Y ')}}</i></small>
                        <hr>

                    @endforeach
                    {!! $contactForms->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection