@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>

    {!! Form::open(['method'=>'post', 'action'=>'AdminPostsController@store', 'files'=>'true']) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('user_id', 'User') !!}
        {!! Form::select('user_id',
                          $users,
                           null,
                           ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categories', 'Categories')!!}
        <br>
        @foreach($categories as $category)
            {!! Form::label($category->id, $category->name)!!}
            {!! Form::checkbox($category->id, $category->name, false) !!}
            <br>
        @endforeach
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textArea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('includes.form_errors')

@endsection
