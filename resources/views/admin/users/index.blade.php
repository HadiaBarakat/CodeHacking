@extends('layouts.admin')




@section('content')


    @if(Session::has('user_deleted'))
        <p class="bg-info">{{session('user_deleted')}}</p>
    @endif
    <h1>Users</h1>

    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role Id</th>
            <th>Image</th>
            <th>Active</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Update</th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_id}}</td>
                    <td><img height="50" class="img-rounded"
                             src="{{$user->image ? $user->image->url : App\Image::$placeholderImage}}"
                             alt=""></td>
                    <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}">Update</a></td>
                  </tr>
          @endforeach
        @endif
        </tbody>
     </table>


@stop
