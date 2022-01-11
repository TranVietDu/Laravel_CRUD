@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')
<div class="content">
    <div class="signup-form">
        <form action="/admin/products/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h2>ADD PRODUCT</h2>
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                <i class="text-danger">{{ $errors->first('product_name') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product Address:</label>
                <input type="text" class="form-control" name="product_address" placeholder="Product Address">
                <i class="text-danger">{{ $errors->first('product_address') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product Price:</label>
                <input type="number" class="form-control" name="product_price" placeholder="Product Price">
                <i class="text-danger">{{ $errors->first('product_price') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product category: </label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
                <i class="text-danger">{{ $errors->first('category_id') }}</i>
            </div>
            <label for="">Product image:</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="product_image" id="inputGroupFile02">
            </div>
            <i class="text-danger">{{ $errors->first('product_image') }}</i>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">ADD</button>
            </div>
        </form>
    </div>
</div>
@endsection