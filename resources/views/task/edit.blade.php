

@extends('layouts.master')
@section('body')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

                <!-- New Task Form -->
                <form action="{{ route('task.update',$task->id)}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @method('put')
                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <input type="text" name="content" id="task-name" class="form-control" value="{{$task->content}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">DeadLine</label>

                        <div class="col-sm-6">
                            <input type="datetime-local" name="deadline" id="task-name" class="form-control" value="{{$task->deadline}}">
                        </div>
                    </div>


                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection
