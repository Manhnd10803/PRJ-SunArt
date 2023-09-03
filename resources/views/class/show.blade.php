@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách học sinh trong lớp
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
                        <h3 class="box-title">Danh sách học sinh lớp : </h3> <br><br>
                        <button type="button" class="btn btn-primary" id="showModalBtn">Hiển thị Modal</button>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học viên</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listStudents as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">DELETE</button>
                                                <a href="{{ route('students.edit', $student->id) }}"
                                                    class="btn btn-primary">Update</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Nút để hiển thị modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
            Thêm học sinh
        </button>

        <!-- Modal để nhập số lượng học sinh -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập số lượng học sinh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="studentQuantityForm">
                            <div class="form-group">
                                <label for="quantity">Số lượng học sinh</label>
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="class_id" value="{{ $class->id }}">
    </section>
    <!-- jQuery CDN -->

    <script>
        document.getElementById('studentQuantityForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var quantity = parseInt(document.getElementById('quantity').value);

            // Kiểm tra xem số lượng học sinh có hợp lệ không (ví dụ: lớn hơn 0)
            if (quantity > 0) {
                // Đóng modal nhập số lượng học sinh
                $("#addStudentModal").hide();
                $(".wrapper").css("z-index", "1");
                // Hiển thị modal để nhập thông tin học sinh dựa trên số lượng
                createStudentModal(quantity);
                $(".modal-backdrop").css("z-index", "0");
            } else {
                alert('Số lượng học sinh phải lớn hơn 0.');
            }
        });

        function createStudentModal(quantity) {

            // Tạo modal để nhập thông tin học sinh dựa trên số lượng
            var studentModalContent =
                '<form action="" method="post">' +
                ' @csrf' +
                '' +
                '<div class="modal" id="addStudentInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                '<input type="hidden" id="_token" value="{{ csrf_token() }}">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title" id="exampleModalLabel">Nhập thông tin học sinh</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                '<div class="modal-body">';

            // Tạo trường nhập thông tin học sinh dựa trên số lượng
            for (var i = 1; i <= quantity; i++) {
                studentModalContent += '<div class="form-group">' +
                    '<label for="name' + i + '">Tên học sinh ' + i + '</label>' +
                    '<input type="text" class="form-control" id="name' + i + '" name="name">' +
                    '</div>';
            }
            studentModalContent += '<div class="btn btn-primary btn-add">Thêm</div>';
            studentModalContent += '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                ' </form>';

            // Thêm modal vào trang
            $(document.body).append(studentModalContent);

            // Hiển thị modal để nhập thông tin học sinh
            $('#addStudentInfoModal').modal('show');
            $(".btn-add").click(function() {
                var data = []; // Khởi tạo một mảng để lưu danh sách sinh viên

                // Sử dụng vòng lặp để thêm từng sinh viên vào mảng
                var class_id = $("#class_id").val()
                for (var i = 1; i <= quantity; i++) {
                    var name = $(`#name${i}`).val(); // Lấy giá trị tên sinh viên từ input có id tương ứng
                    // Tạo một đối tượng sinh viên và thêm vào mảng data
                    var student = {
                        name: name,
                        class_id: class_id,
                    };
                    data.push(student);
                }
                let _csrf = '{{ csrf_token() }}';
                // Thực hiện yêu cầu AJAX POST
                $.ajax({
                    type: 'POST', // Phương thức POST
                    url: '{{ route('class.add') }}', // Đường dẫn của máy chủ xử lý yêu cầu
                    data: {
                        data,
                        _token: _csrf
                    }, // Dữ liệu bạn muốn gửi
                    success: function(response) {
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Xử lý lỗi nếu có
                        console.error('Lỗi: ' + textStatus, errorThrown);
                    }
                });

                console.log(data)
            });
        }
    </script>
@endsection
