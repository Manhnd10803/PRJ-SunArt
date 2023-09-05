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
        <li class="active">Danh sách</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách giáo viên</h3> <br><br>
                    <a href="{{ route('teacher.create') }}"><button class="btn btn-success">Thêm mới</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên giáo viên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Number of Shift</th>
                                <th>Lớp ( class_id )</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($teacher as $tea)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $tea->name }}</td>
                                <td>{{ $tea->phoneNumber }}</td>
                                <td>{{ $tea->email }}</td>
                                <td>{{ $tea->numberOfShifts }}</td>
                                <td>

                                    @foreach ($classes as $item)
                                        {{ $tea->class_id == $item->id ? $item->name : '' }}
                                    @endforeach
                                    
                                </td>
                                <td><a href=""><button class="btn btn-info">Truy cập</button></a>
                                    <a href="{{ route('teacher.edit', $tea->id) }}"><button class="btn btn-primary">Cập nhật</button></a>
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
                    @foreach ($teacher as $tea)
                    <div class="modal modal-danger fade in" id="modal-danger{{ $y }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Lưu ý</h4>
                            </div>
                            <div class="modal-body">
                                <p>Bạn chắc chắn muốn xóa giáo viên {{ $tea->name }} chứ ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <form action="{{ route('teacher.destroy', $tea->id) }}" method="post">
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