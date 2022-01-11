@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')
<div style="height: 600px;" class="content">
    <h2>UPDATE CATEGORY</h2>
    <form method="POST" action="{{route('categories.update',$category->id)}}" class="form-inline">
        @csrf
        {{method_field('put')}}
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Category</label>
            <input type="text" class="form-control" name="category" required value="{{$category->category}}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Update Category</button>
    </form>
</div>
@endsection