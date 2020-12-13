@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách danh mục</h1>
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
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{route('backend.categories.create')}}" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> </a> Số lượng danh mục <a href="#" style="color: red!important;"> {{$categories_number}}</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Danh mục cha</th>
                                <th>Tên danh mục</th>
                                <th>Show sản phẩm</th>
                                <th>Chỉnh sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr style="text-align: center;">

                                <td>{{$category->id}}</td>
                                @if($category->parent_id == -1)
                                <td>===Danh mục cha===</td>
                                @elseif($category->parent_id == 0)
                                    <td>Null</td>
                                @else
                                    @foreach($ctrs as $ctr)
                                        @if($ctr->id == $category->parent_id)
                                    <td>{{$ctr->name}}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td>{{$category->name}}</td>
                                <td><a href="{{route('backend.categories.show',$category->id)}}" class="btn btn-primary">Show</a></td>
                                <td>
                                    <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('backend.categories.destroy',$category->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i> Xoá
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
