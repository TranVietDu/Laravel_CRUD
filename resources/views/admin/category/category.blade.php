@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center"><i class="nc-icon nc-bullet-list-67"></i> Categories Management</h3>
                </div>
                <div style="margin-left: 20px;" class="add">
                    <button class="btn btn-success"><a style="color: white;text-decoration: none;" href="{{route('categories.create')}}">Add Category</a></button>
                    <button type="input" class="btn btn-danger" id="deleteall" value="">Delete Selected Rows</button>
                </div>
                <form style="margin-left: 20px;" class="form-inline" action="" method="get">
                        <input type="search" placeholder="Category" name="search" id="search">
                        <button class="btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
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
                                    Name
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($categories as $category)
                                <tr id="sid{{$category->id}}">
                                    <td>
                                        <input type="checkbox" name="ids" class="checkBoxClass" value="{{$category->id}}">
                                    </td>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        {{$category->category}}
                                    </td>
                                    <td class="text-right">
                                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="{{route('categories.edit',$category->id)}}"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a>
                                        <a href="{{route('categories.view_product',$category->id)}}"><button class="btn btn-primary"><i class="fas fa-align-justify"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$categories->links("pagination::bootstrap-4")}}
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
                url:"{{route('categories.destroyall')}}",
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
                                url: '/admin/categories/search',
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