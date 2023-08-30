@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 mt-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Student</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('students.update', $student) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tên học sinh</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName"
                                placeholder="Tên học sinh" value="{{ old('name') ?? $student->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGender1">Giới tính</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="1" id=""
                                    {{ $student->gender == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="2" id=""
                                    {{ $student->gender == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPhone1" name="phoneNumber"
                                placeholder="Số điện thoại" value="{{ old('phoneNumber') ?? $student->phoneNumber }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Classroom</label>
                            <select class="form-control" id="exampleInputclassroom1" name="class_id">
                                <option value="">Select Class</option>
                                @foreach ($classrooms as $item)
                                    <option value="{{ $item->id ?? old('class_id') }}"
                                        {{ $item->id == $student->class_id ? 'selected' : 'false' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputSchool1">School</label>
                            <input type="text" class="form-control" id="exampleInputSchool1" name="school"
                                placeholder="Trường" value="{{ old('school') ?? $student->school }}">
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
