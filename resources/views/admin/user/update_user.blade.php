@extends('admin.layoutadmin.masterlayoutadmin')

@section('content')

<div style="height: 600px;" class="content">
    <div class="signup-form">
        <form action="{{route('users.update',[$user->id])}}" method="POST">
            @csrf
            {{method_field('put')}}
            <h2>Update User</h2>
            <form action="{{route('users.destroy',[$user->id])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
            </form>
            <div class="form-group">
                <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="UserName">
                <i class="text-danger">{{ $errors->first('name') }}</i>
            </div>
            <div class="form-group">
                <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Email">
                <i class="text-danger">{{ $errors->first('email') }}</i>
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="role" id="">
                    <option value="0" {{($user->role === '0') ? 'Selected' : ''}}>User</option>
                    <option value="1" {{($user->role === '1') ? 'Selected' : ''}}>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE</button>
            </div>

        </form>
    </div>
</div>

@endsection
