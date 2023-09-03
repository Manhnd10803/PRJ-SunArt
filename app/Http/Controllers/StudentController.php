<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Faker\Core\Number;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $student;
    protected $classroom;
    public function __construct(Student $student, Classroom $classroom)
    {
        $this->student = $student;
        $this->classroom = $classroom;
    }
    public function index()
    {
        $students = $this->student->latest('id')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = $this->classroom->all();
        return view('student.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['class_id'] = (int) ($request->class_id);
        $data['gender'] = (int) ($request->gender);
        $this->student->create($data);

        return redirect()->route('students.index');
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
        $classrooms = $this->classroom->all();
        return view('student.edit', compact(['student', 'classrooms']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->all();
        $data['class_id'] = (int) ($request->class_id);
        $data['gender'] = (int) ($request->gender);
        $student->update($data);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('students.index');
    }
}
