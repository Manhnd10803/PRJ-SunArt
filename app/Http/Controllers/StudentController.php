<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Classroom $class)
    {
        $students = Student::where('class_id', $class->id)->get();
        return view('student.index', compact('class', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $number = $request->numberStudent;
        $idClass = $request->idClass;
        return view('student.create', compact('number', 'idClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'names.*' => 'required'
        ]);
        foreach($request->names as $name){
            Student::create(['name' => $name, 'gender' => '3', 'class_id' => $request->idClass]);
        }
        toastr()->success('Thêm thành công', 'Đã thêm học sinh thành công');
        return redirect()->route('students.index', ['class' => $request->idClass]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = Classroom::all();
        return view('student.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'phoneNumber' => $request->phoneNumber,
            'school' => $request->school,
            'class_id' => $request->class_id,
        ];
        $student->update($data);
        toastr()->success('Cập nhật thành công', 'Đã cập nhật thông tin học sinh '.$student->name);
        return redirect()->route('students.index', ['class' => $request->class_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Course::where('student_id', $student->id)->delete();
        $student->delete();
        toastr()->success('Xóa thành công', 'Đã xóa học sinh '.$student->name.' thành công');
        return redirect()->back();
    }
}
