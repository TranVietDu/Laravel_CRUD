@extends('admin.layoutadmin.masterlayoutadmin')

@section('content')
<div style="height: 600px;" class="content">
<div class="signup-form">
        <form action="{{route('users.store')}}" method="post">
            {{ csrf_field() }}
            <h2>Add User</h2>
            <div class="form-group">
                <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="UserName">
                <i class="text-danger">{{ $errors->first('name') }}</i>
            </div>
            <div class="form-group">
                <input type="email"  value="{{old('email')}}" class="form-control" name="email" placeholder="Email">
                <i class="text-danger">{{ $errors->first('email') }}</i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <i class="text-danger">{{ $errors->first('password') }}</i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                <i class="text-danger">{{ $errors->first('confirm_password') }}</i>
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="role" id="">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">ADD</button>
            </div>
            
        </form>
    </div>
</div>

@endsection