@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Content -->
@endsection
@section('content')
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('backend.categories.upload',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="" value="{{$category->name}}" name="name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        @if($category->parent_id != -1)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    @foreach($categories as $ctr)
                                    <option value="{{$ctr->id}}" @if($category->parent_id == $ctr->id) selected @endif>{{$ctr->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @endif

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.categories.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
