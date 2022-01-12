@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center"><i class="nc-icon nc-bullet-list-67"></i> It Work Management</h3>
                </div>
                <div style="margin-left: 20px;" class="add">
                    <button class="btn btn-success"><a style="color: white;text-decoration: none;" href="{{route('it_works.create')}}">Add Work</a></button>
                    <button type="input" class="btn btn-danger" id="deleteall" value="">Delete Selected Rows</button>
                </div>
                <form style="margin-left: 20px;" class="form-inline" action="" method="get">
                        <input type="search" placeholder="It Work" name="search" id="search">
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
                                    TITLE
                                </th>
                                <th>
                                    CONTENT
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($it_works as $it_work)
                                <tr id="sid{{$it_work->id}}">
                                    <td>
                                        <input type="checkbox" name="ids" class="checkBoxClass" value="{{$it_work->id}}">
                                    </td>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        {{$it_work->title}}
                                    </td>
                                    <td>
                                        {{$it_work->content}}
                                    </td>
                                    <td class="text-right">
                                        <form action="{{route('it_works.destroy',$it_work->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td> <a href="{{route('it_works.edit',$it_work->id)}}"><button class="btn btn-primary"><i class="fas fa-user-edit"></i></button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$it_works->links("pagination::bootstrap-4")}}
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
                url:"{{route('it_works.destroyall')}}",
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
                                url: '/admin/it_works/search',
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