@extends('admin.layoutadmin.masterlayoutadmin')

@section('content')
<div class="content">
<div class="signup-form">
        <form action="{{route('it_works.update',$it_work->id)}}" method="post">
            {{ csrf_field() }}
            {{method_field('put')}}
            <h2>Update Work</h2>
            <div class="form-group">
                <input type="text" value="{{$it_work->title}}" class="form-control" name="title" placeholder="Title">
                <i class="text-danger">{{ $errors->first('title') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{$it_work->content}}" class="form-control" name="content" placeholder="Content">
                <i class="text-danger">{{ $errors->first('content') }}</i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@endsection