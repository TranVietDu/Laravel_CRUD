@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nc-icon nc-single-02"></i> Products </h4>
                </div>
                <div style="margin-left: 20px;">
                    <button type="input" class="btn btn-danger" id="deleteall" value="">Delete Selected Rows</button>
                </div>
                @if (session('message'))
                <div class="alert alert-success hide">
                    {{session('message')}}
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    <input type="checkbox" id="chkCheckAll"/>
                                </th>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Price
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($products as $product)
                                <tr id="sid{{$product->id}}">
                                    <td>
                                        <input type="checkbox" name="ids" class="checkBoxClass" value="{{$product->id}}">
                                    </td>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                       <img width="100px" height="100px" src="{{asset('product_image/'.$product->product_image)}}" alt="">
                                    </td>
                                    <td>
                                        {{$product->product_name}}
                                    </td> 
                                    <td>
                                        {{$product->product_address}}
                                    </td>
                                    <td>
                                        {{$product->product_price}}
                                    </td>
                                    <td class="text-right">
                                        <form action="{{route('products.destroy',[$product->id])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td><a href="{{route('products.edit',[$product->id])}}"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Xóa nhiều
    $(function(e) {
        $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });

        $("#deleteall").click(function(e){
            e.preventDefault();
            var allids= [];
            $("input:checkbox[name=ids]:checked").each(function(){
                allids.push($(this).val());
            });
            $.ajax({
                url:"{{route('products.destroyall')}}",
                type:'GET',
                data:{
                    ids:allids,
                    _token:$("input[name=_token]").val()
                },
                success:function(response)
                {
                    $.each(allids,function(key,val){
                        $('#sid'+val).remove();
                    });
                }
            });
        });
    });
    // Search
    $('#search').on('keyup', function() {
                            $value = $(this).val();
                            $.ajax({
                                type: 'get',
                                url: '/admin/products/search',
                                data: {
                                    'search': $value
                                },
                                success: function(data) {
                                    $('tbody').html(data);
                                }
                            });
                        })
                        $.ajaxSetup({
                            headers: {
                                'csrftoken': '{{ csrf_token() }}'
                            }
                        });
</script>
@endsection