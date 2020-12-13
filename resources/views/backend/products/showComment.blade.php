@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Bình Luận Sản Phẩm</h1>
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
                        <h3 class="card-title">số lượng bình luận <span style="color:red!important;">{{$numbers}}</span></h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>User_id</th>
                                <th>Product_id</th>
                                <th>Comments</th>
                                <th>Duyệt</th>
                                <th>Xóa</th>



                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr style="text-align: center;">

                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->user_id}}</td>
                                        <td>{{$comment->product_id}}</td>
                                    @if($comment->status == 0)
                                        <td>{{$comment->comment}}</td>
                                    @elseif($comment->status == 1)
                                        <td>{{$comment->comment}} <i class="fa fa-check-circle" aria-hidden="true" style="color: blue;"></i></td>
                                    @endif
                                    <td>
                                        @if($comment->status == 0)
                                        <a href="{{route('frontend.comments.acComment',$comment->id)}}" class="btn btn-success">Duyệt</a>
                                        @elseif($comment->status == 1)
                                        <a href="{{route('frontend.comments.notAcComment',$comment->id)}}" class="btn btn-danger">Bỏ Duyệt</a>
                                        @endif

                                    </td>
                                    <td><form action="{{route('frontend.comments.destroy',$comment->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Xóa</button>

                                        </form></td>





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
