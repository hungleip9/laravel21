@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
                {{--                bao loi session--}}
                @if(session()->has('success'))
                    <span style="color: white;background-color: green;">{{session()->get('success')}}</span>
                @else
                    <span style="color: white;background-color: red;">{{session()->get('error')}}</span>
                @endif
                {{--                ket thuc bao loi session--}}
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> <a href="{{route('backend.user.create')}}" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> </a> Số lượng người dùng <a href="#" style="color: red!important;"> {{$user_number}}</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Sản Phẩm</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr style="text-align: center;">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td><a href="{{route('backend.user.showProduct',$user->id)}}" class="btn btn-primary">Show</a></td>
                                <td>{{$user->email}}</td>

                                @if($user->role==2)
                                    <td>User</td>
                                @elseif($user->role==1)
                                    <td>Admin</td>
                                @elseif($user->role==3)
                                    <td>Boss</td>
                                @endif
                                @if($user->role==3)
                                    <td></td>
                                    <td></td>
                                @elseif($user->role!=2)
                                    @can('big-boss')
                                        <td>
                                            <a href="{{route('backend.user.edit',$user->id)}}" class="btn btn-success">Chỉnh sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{route('backend.user.destroy',$user->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Xoá
                                                </button>
                                            </form>
                                        </td>
                                    @endcan
                                @elseif($user->role==2)
                                    <td>
                                        <a href="{{route('backend.user.edit',$user->id)}}" class="btn btn-success">Chỉnh sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{route('backend.user.destroy',$user->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Xoá
                                            </button>
                                        </form>
                                    </td>

                                @endif


                            </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.row (main row) -->
    </div>
    {{ $users->links() }}

@endsection

