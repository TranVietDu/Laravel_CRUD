@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')
<div class="content">
    <div class="signup-form">
        <form action="{{route('products.update',[$product->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            <h2>UPDATE PRODUCT</h2>
            <div class="form-group">
                <label for="">Product Name:</label>
                <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name">
                <i class="text-danger">{{ $errors->first('product_name') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product Address:</label>
                <input type="text" class="form-control" value="{{$product->product_address}}" name="product_address">
                <i class="text-danger">{{ $errors->first('product_address') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product Price($):</label>
                <input type="number" class="form-control" value="{{$product->product_price}}" name="product_price">
                <i class="text-danger">{{ $errors->first('product_price') }}</i>
            </div>
            <div class="form-group">
                <label for="">Product category: </label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="">
                    @foreach($categories as $category)
                    <option {{($category->id === $product->category_id) ? 'Selected' : ''}} value="{{$category->id}}">{{$category->category}}</option>
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
                <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@endsection