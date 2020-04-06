@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img class="img-responsive img-rounded"
             src="{{$user->image ? $user->image->url : App\Image::$placeholderImage}}"
             alt="">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user,
                    ['method'=>'patch', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true']) !!}
            @csrf
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id',
                                  $roles,
                                   null,
                                   ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Active') !!}
                {!! Form::select('is_active',
                           [1=>'Active', 0=>'Not Active'],
                             null,
                             ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
        @include('includes.form_errors')
    </div>
@endsection
