@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý học sinh
        {{-- <small>advanced tables</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('classes.index') }}">Lớp học</a></li>
        <li class="active">Sửa thông tin học sinh</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa thông tin học sinh</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tên học sinh</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select name="gender" id="" class="form-control">
                                    <option value="3" @selected($student->gender == 3)>Không xác đinh</option>
                                    <option value="1" @selected($student->gender == 1)>Nam</option>
                                    <option value="2" @selected($student->gender == 2)>Nữ</option>
                                </select>
                                @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Trường học hiện tại</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="school" value="{{ $student->school }}">
                                @error('school')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phoneNumber" value="{{ $student->phoneNumber }}">
                                @error('phoneNumber')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Lớp học</label>
                            <div class="col-sm-8">
                                <select name="class_id" id="" class="form-control">
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" @selected($student->class_id == $class->id)>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{-- <a href="{{ route('classes.index') }}" class="btn btn-default">Cancel</a> --}}
                        <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection