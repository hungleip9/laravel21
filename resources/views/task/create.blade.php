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
                <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Noi Dung Cong Viec</label>
                        <div class="col-sm-6">
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Thoi gian</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" name="deadline" id="task-name" class="form-control" value="Deadline">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Muc do uu tien</label>
                        <div class="col-sm-6">
                            <select name="priority" class="col-sm-3 control-label form-control" id="">
                                <option value="0">Binh Thuong</option>
                                <option value="1">Quan Trong</option>
                                <option value="2">Khan Cap</option>

                            </select>
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

        <!-- Current Tasks -->

    </div>
@endsection

