@extends('admin.layoutadmin.masterlayoutadmin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nc-icon nc-single-02"></i> Recycle Bin User</h4>
                </div>
                <form style="margin-left: 20px;" class="form-inline" action="" method="get">
                        <input type="search" placeholder="User" name="search" id="search">
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
                                    STT
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($users as $user)
                                <tr id="sid{{$user->id}}">
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    @if($user->role==1)
                                    <td>
                                        Admin
                                    </td>
                                    @else
                                    <td>
                                        User
                                    </td>
                                    @endif
                                    <td class="text-right">
                                        <form action="{{route('users.permanentlydelete',$user->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="{{route('users.restore',$user->id)}}"><button class="btn btn-primary"><i class="fas fa-recycle"></i></button></a>
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
</div>
@endsection