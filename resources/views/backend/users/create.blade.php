@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo người dùng</h1>
                <a href="{{route('backend.user.index')}}" class="btn btn-primary">Back</a>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tạo mới người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('backend.user.store')}}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Tên người dùng">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" id="" placeholder="Email">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection

