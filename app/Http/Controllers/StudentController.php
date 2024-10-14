<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('classroom')->paginate(10);
        return view('students.index', compact('students'));
    }

    // Hiển thị form thêm mới sinh viên
    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm mới.');
    }

    // Hiển thị chi tiết sinh viên
    public function show(Student $student)
    {
        $student->load(['classroom', 'passport', 'subjects']);
        return view('students.show', compact('student'));
    }

    // Hiển thị form chỉnh sửa sinh viên
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Thông tin sinh viên đã được cập nhật.');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa.');
    }
}
