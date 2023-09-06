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
        <li class="active">Danh sách học sinh</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách học sinh lớp {{ $class->name }}</h3> <br><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                        Thêm mới
                    </button>
                    <div class="modal fade in" id="modal-add">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Bạn cần thêm bao nhiêu học sinh</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('students.create') }}" method="GET">
                                    @method('GET')
                                    @csrf
                                    <input type="number" min="1" name="numberStudent" class="form-control">
                                    <input type="hidden" name="idClass" value="{{ $class->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Đồng ý</button>
                                </form>
                            </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên học sinh</th>
                                <th>Giới tính</th>
                                <th>Trường học</th>
                                <th>Số điện thoại</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $student->name }}</td>
                                <td>@if ($student->gender == 1)
                                    Nam 
                                @elseif($student->gender == 2)
                                    Nữ
                                @elseif($student->gender == 3)
                                    
                                @endif</td>
                                <td>{{ $student->school }}</td>
                                <td>{{ $student->phoneNumber }}</td>
                                <td><a href="{{ route('students.edit', $student->id) }}"><button class="btn btn-primary">Cập nhật</button></a>
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
                    @foreach ($students as $student)
                    <div class="modal modal-danger fade in" id="modal-danger{{ $y }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Xác nhận xóa học sinh {{ $student->name }}</h4>
                            </div>
                            <div class="modal-body">
                                <p>Khi thực hiện sẽ xóa mọi thông tin liên quan đến học sinh và lịch sử học.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
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