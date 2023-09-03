@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý lớp học
        {{-- <small>advanced tables</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lớp học</a></li>
        <li class="active">Danh sách</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách lớp học</h3> <br><br>
                    <a href="{{ route('classes.create') }}"><button class="btn btn-success">Thêm mới</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên lớp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($classes as $class)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $class->name }}</td>
                                <td><a href="{{ route('classes.show', $class->id) }}"><button class="btn btn-info">Truy cập</button></a>
                                    <a href="{{ route('classes.edit', $class->id) }}"><button class="btn btn-primary">Cập nhật</button></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $i }}">
                                        Xóa
                                    </button>
                              
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    @php
                        $y = 1;
                    @endphp
                    @foreach ($classes as $class)
                    <div class="modal modal-danger fade in" id="modal-danger{{ $y }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Lưu ý</h4>
                            </div>
                            <div class="modal-body">
                                <p>Khi thực hiện xóa lớp {{ $class->name }} tất cả học sinh trong lớp sẽ bị xóa và giáo viên đang dạy trong lớp sẽ được chuyển thành trống.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <form action="{{ route('classes.destroy', $class->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline">Đồng ý</button>
                                </form>
                            </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    @php
                        $y++;
                    @endphp
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection