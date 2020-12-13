
@extends('layouts.master')
@section('body')
    <div class="col-sm-offset-2 col-sm-8">


        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>


            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>ID</th>
                    <th>Tên công việc</th>
                    <th>Dead line</th>
                    <th>Content</th>
                    <th>Priority</th>
                    <th>
                        <a href="{{route('task.create')}}">Them Cong Viec</a>
                    </th>
                    </thead>
                    <tbody>
                    @php
                        $i=1;


                    @endphp
                    @foreach($tasks as $task)


                        <tr>
                            <td>{{$i}}</td>
                            @php
                            $i++;
                                @endphp
                            <td class="table-text"><div class="name">{{$task->name}} </div></td>
                            <td class="table-text"><div class="deadline">{{$task->deadline}} </div></td>
                            <td class="table-text"><div class="content">{{$task->content}} </div></td>
                            <td class="table-text">
                                @if($task->priority==1)
                                    <div class="priority" style="color: green">Binh Thuong</div>
                                @elseif($task->priority==2)
                                    <div class="priority" style="color: blue">Uu Tien</div>
                                @elseif($task->priority==3)
                                    <div class="priority" style="color: red">Can Gap</div>
                                @endif
                                </td>
                            <!-- Task Complete Button -->
                            <td>
                                @if($task->status == 1 )
                                    <form action="{{route('task.complete',$task->id)}}" >
                                        <button class="btn btn-success"><i class="fa fa-btn fa-check"></i>Hoàn thành</button>

                                    </form>
                                    @elseif($task->status == 2)
                                    <form action="{{route('task.reComplete',$task->id)}}">
                                        <button class="btn btn-primary"><i class="fa fa-btn fa-check"></i>Lam Lai</button>

                                    </form>


                                    @endif

                                <a href="{{ route('task.edit',$task->id) }}" type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-check"></i>Chinh Sua
                                </a>
                            </td>
                            <!-- Task Delete Button -->
                            <td>
                                <form action="{{route('task.destroy',$task->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Xoá
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

{{--                    <tr>--}}
{{--                        <td>2</td>--}}
{{--                        <td class="table-text"><div>Làm bài tập PHP  </div></td>--}}
{{--                        <!-- Task Complete Button -->--}}
{{--                        <td>--}}
{{--                            <a href="{{ url('task/complete/1') }}" type="submit" class="btn btn-success">--}}
{{--                                <i class="fa fa-btn fa-check"></i>Hoàn thành--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <!-- Task Delete Button -->--}}
{{--                        <td>--}}
{{--                            <form action="{{ url('task/2') }}" method="POST">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('DELETE') }}--}}

{{--                                <button type="submit" class="btn btn-danger">--}}
{{--                                    <i class="fa fa-btn fa-trash"></i>Xoá--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>3</td>--}}
{{--                        <td class="table-text"><div><strike>Làm project Laravel </strike></div></td>--}}
{{--                        <!-- Task Complete Button -->--}}
{{--                        <td>--}}
{{--                            <a href="{{ url('task/reComplete/1') }}" type="submit" class="btn btn-success">--}}
{{--                                <i class="fa fa-btn fa-refresh"></i>Làm lại--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <!-- Task Delete Button -->--}}
{{--                        <td>--}}
{{--                            <form action="{{ url('task/3') }}" method="POST">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('DELETE') }}--}}

{{--                                <button type="submit" class="btn btn-danger">--}}
{{--                                    <i class="fa fa-btn fa-trash"></i>Xoá--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

@endsection
