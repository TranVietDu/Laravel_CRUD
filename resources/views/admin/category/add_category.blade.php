@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')
<div style="height: 600px;" class="content">
    <h2>ADD CATEGORY</h2>
    <form method="POST" action="{{route('categories.store')}}" class="form-inline">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Category</label>
            <input type="text" class="form-control" name="category" required placeholder="Category">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Add Category</button>
    </form>
</div>
@endsection