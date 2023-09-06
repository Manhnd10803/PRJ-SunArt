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
        <li class="active">Thêm học sinh</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm học sinh</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('students.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="box-body">
                        <input type="hidden" name="idClass" value="{{ $idClass }}">
                        @for ($i = 1; $i <= $number; $i++)
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tên học sinh {{ $i }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="names[]" value="">
                            </div>
                        </div>
                        @endfor
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{-- <button class="btn btn-default">Cancel</button> --}}
                        <button type="submit" class="btn btn-success pull-right">Thêm</button>
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