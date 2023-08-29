@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 mt-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form  action="{{route('students.store')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tên học sinh</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Tên học sinh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGender1">Giới tính</label>
                           <div class="form-check">
                             <input class="form-check-input" type="radio" name="gender" id="">
                             <label class="form-check-label" for="">
                              Nam
                             </label>
                           </div>
                           <div class="form-check">
                             <input class="form-check-input" type="radio" name="gender" id="">
                             <label class="form-check-label" for="">
                               Nữ
                             </label>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPhone1" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSchool1">School</label>
                            <input type="text" class="form-control" id="exampleInputSchool1" name="school" placeholder="Trường">
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
