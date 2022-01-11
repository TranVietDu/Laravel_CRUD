@extends('admin.layoutadmin.masterlayoutadmin')

@section('content')
<div class="content">
<div class="signup-form">
        <form action="{{route('pricing_plans.store')}}" method="post">
            {{ csrf_field() }}
            <h2>Add Pricing Plan</h2>
            <div class="form-group">
                <input type="number" value="{{old('price')}}" class="form-control" name="price" placeholder="Price">
                <i class="text-danger">{{ $errors->first('price') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('package')}}" class="form-control" name="package" placeholder="Package">
                <i class="text-danger">{{ $errors->first('package') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_1')}}" class="form-control" name="content_1" placeholder="Content 1">
                <i class="text-danger">{{ $errors->first('package') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_2')}}" class="form-control" name="content_2" placeholder="Content 2">
                <i class="text-danger">{{ $errors->first('content_2') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_3')}}" class="form-control" name="content_3" placeholder="Content 3">
                <i class="text-danger">{{ $errors->first('content_3') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_4')}}" class="form-control" name="content_4" placeholder="Content 4">
                <i class="text-danger">{{ $errors->first('content_4') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_5')}}" class="form-control" name="content_5" placeholder="Content 5">
                <i class="text-danger">{{ $errors->first('content_5') }}</i>
            </div>
            <div class="form-group">
                <input type="text"  value="{{old('content_6')}}" class="form-control" name="content_6" placeholder="Content 6">
                <i class="text-danger">{{ $errors->first('content_6') }}</i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">ADD</button>
            </div>
            
        </form>
    </div>
</div>
@endsection