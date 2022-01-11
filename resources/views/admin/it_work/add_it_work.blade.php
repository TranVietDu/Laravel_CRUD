@extends('admin.layoutadmin.masterlayoutadmin')

@section('content')
<div class="content">
<div class="signup-form">
        <form action="{{route('it_works.store')}}" method="post">
            {{ csrf_field() }}
            <h2>Add Work</h2>
            <div class="form-group">
                <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Title">
                <i class="text-danger">{{ $errors->first('title') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content')}}" class="form-control" name="content" placeholder="Content">
                <i class="text-danger">{{ $errors->first('content') }}</i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">ADD</button>
            </div>
            
        </form>
    </div>
</div>
@endsection