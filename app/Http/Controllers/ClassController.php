<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classroom::all();
        return view('class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:classrooms',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên vừa nhập đã tồn tại'
            ]
        );
        $data = [
            'name' => $request->name,
            'note' => $request->note,
        ];
        Classroom::create($data);
        toastr()->success('Đã tạo lớp ' . $request->name . ' thành công', 'Thêm thành công');
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $class)
    {
        $listStudents = Student::where('class_id', $class->id)->get();

        return view('class.show', compact('listStudents', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $class)
    {
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $class)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
            ]
        );
        $data = [
            'name' => $request->name,
            'note' => $request->note,
        ];
        $class->update($data);
        toastr()->success('Đã sửa lớp ' . $request->name . ' thành công', 'Cập nhật thành công');
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $class)
    {
        $students = Student::where('class_id', $class->id)->get();
        $idStudents = [];
        foreach ($students as $student) {
            array_push($idStudents, $student->id);
        }
        Course::whereIn('student_id', $idStudents)->delete();
        Student::whereIn('class_id', $class)->delete();
        Teacher::where('class_id', $class->id)->update(['class_id' => null]);
        $class->delete();
        toastr()->success('Đã xóa lớp ' . $class->name . ' thành công', 'Xóa thành công');
        return redirect()->route('classes.index');
    }
    public function storeList(Request $request)
    {
        $studentsData = $request->data;
        foreach ($studentsData as $studentData) {
            $student = new Student();
            $student->name = $studentData['name'];
            $student->class_id = $studentData['class_id'];
            $student->save();
        }
        toastr()->success('Thêm sinh viên thành công', 'Thêm thành công');
        return response()->json(200);
    }
}
