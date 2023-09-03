@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Students</h3>
                <a href="{{ route('students.create') }}"><button class="btn btn-success">Thêm mới</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                                        aria-controls="example1" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-6">
                            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control input-sm" placeholder="" aria-controls="example1"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 20.443px;">#</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 189.443px;">Name</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 106.295px;">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100.011px;">PhoneNumber</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                            style="width: 200.682px;">School</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                            style="width: 100.682px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $item)
                                        <tr role="row" class="odd">
                                            <td class="">{{ $item->id }}</td>
                                            <td class="">{{ $item->name }}</td>
                                            <td class="">{{ $item->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="">{{ $item->phoneNumber }}</td>
                                            <td class="">{{ $item->school }}</td>
                                            <td>
                                                <form action="{{ route('students.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">DELETE</button>
                                                    <a href="{{ route('students.edit', $item) }}"
                                                        class="btn btn-primary">Update</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Id</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Gender</th>
                                        <th rowspan="1" colspan="1">PhoneNumber</th>
                                        <th rowspan="1" colspan="1">School</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="example1_previous"><a
                                            href="#" aria-controls="example1" data-dt-idx="0"
                                            tabindex="0">Previous</a></li>
                                    <li class="paginate_button active"><a href="#" aria-controls="example1"
                                            data-dt-idx="1" tabindex="0">1</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                            data-dt-idx="2" tabindex="0">2</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                            data-dt-idx="3" tabindex="0">3</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                            data-dt-idx="4" tabindex="0">4</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                            data-dt-idx="5" tabindex="0">5</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                            data-dt-idx="6" tabindex="0">6</a></li>
                                    <li class="paginate_button next" id="example1_next"><a href="#"
                                            aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
