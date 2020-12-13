@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
                <a href="{{route('backend.user.index')}}" class="btn btn-primary">Back</a>
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
                        <h3 class="card-title">Sản phẩm mới nhập</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>



                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr style="text-align: center;">

                                <td>{{$product->id}}</td>

                                <td>{{$product->name}}</td>

                                <td><img src="/storage/{{$product->avatar}}" alt="" style="width: 50px;height: 50px;"></td>

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
    </div><!-- /.container-fluid -->
@endsection
