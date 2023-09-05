@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý giáo viên
        {{-- <small>advanced tables</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Giáo viên</a></li>
        <li class="active">Sửa thông tin</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập nhật giáo viên {{ $teacher->name }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tên giáo viên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ $teacher->name }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phoneNumber" value="{{ $teacher->phoneNumber }}">
                                @error('phoneNumber')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="{{ $teacher->email }}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Number of Shift</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="numberOfShifts" value="{{ $teacher->numberOfShifts }}" min="1">
                                @error('numberOfShifts')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">ID Lớp</label>
                            <div class="col-sm-8">

                                <select name="class_id" id="" class="form-control">

                                    @foreach ($classes as $item)
                                        <option value="{{ $item->id }}" @if ( $teacher->class_id == $item->id ) checked @endif>{{ $item->name }}</option>
                                    @endforeach

                                </select>  

                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('teacher.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-success pull-right">Cập nhật</button>
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