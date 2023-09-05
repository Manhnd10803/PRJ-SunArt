<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teacher = Teacher::all();
        $classes = Classroom::all();
        return view('teacher.index',compact('teacher','classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classroom::all();
        return view('teacher.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required|unique:teachers',
            'email' => 'required|unique:teachers',
        ],
        [
            'name.required' => 'Tên giáo viên không được để trống',
            'phoneNumber.required' => 'Số điện thoại không được để trống',
            'phoneNumber.unique' => 'Số điện thoại vừa nhập đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email vừa nhập đã tồn tại'
        ]);

        $data = [
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'numberOfShifts' => $request->numberOfShifts,
            'class_id' => $request->class_id
        ];
        Teacher::create($data);
        toastr()->success('Đã tạo giáo viên '.$request->name.' thành công', 'Thêm thành công');
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $teacher = Teacher::find($id);
        // $classes = Classroom::all();
        // return view('teacher.index',compact('teacher','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teacher = Teacher::find($id);
        $classes = Classroom::all();
        return view('teacher.edit',compact('teacher','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required|unique:teachers',
            'email' => 'required|unique:teachers',
        ],
        [
            'name.required' => 'Tên giáo viên không được để trống',
            'phoneNumber.required' => 'Số điện thoại không được để trống',
            'phoneNumber.unique' => 'Số điện thoại vừa nhập đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email vừa nhập đã tồn tại'
        ]);

        $data = [
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'numberOfShifts' => $request->numberOfShifts,
            'class_id' => $request->class_id
        ];
        $teacher->update($data);
        toastr()->success('Đã sửa thông tin giáo viên '.$request->name.' thành công', 'Cập nhật thành công');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teacher = Teacher::find($id);
        $teacher->delete();
        toastr()->success('Đã xóa giáo viên '.$teacher->name.' thành công', 'Xóa thành công');
        return redirect()->route('teacher.index');

    }
}
