@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo Danh Mục</h1>
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
                        <h3 class="card-title">Tạo Danh Mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('backend.categories.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
{{--                                @if ($errors->any())--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        <ul>--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="" placeholder="Điền tên danh mục " name="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục cha</label>
                                <select name="parent_id" class="form-control">
                                    <option value="-1">===Danh mục cha===</option>
                                    @foreach($cts as $ct)
                                        <option value="{{$ct->id}}"> {{$ct->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.categories.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
