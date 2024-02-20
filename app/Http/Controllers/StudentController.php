<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $numberOfRecord = Student::count();
         $perPage = 5;
         $numberOfPage = $numberOfRecord % $perPage == 0?
              (int) ($numberOfRecord / $perPage): (int) $numberOfRecord / $perPage + 1;
         $pageIndex = 1;
         if($request->has('pageIndex'))
             $pageIndex = $request->input('pageIndex');
         if($pageIndex < 1) $pageIndex = 1;
         if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
         //
         $students = Student::orderByDesc('id')
                 ->skip(($pageIndex-1)*$perPage)
                 ->take($perPage)
                 ->get();  
         // dd($arr);
         return view('index', compact( 'students', 'numberOfPage', 'pageIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('create' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // add
        Student::create($request->all());
        return redirect()->route('students.index')->with('mes', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student , Request $request)
    {
        //
        //page index
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // show
        $course = Course::where('id', $student->courseId)->first();
        return view('show', compact('student', 'course', 'pageIndex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, Request $request)
    {
        //
        // pageIndex
         $pageIndex = 1;
         if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
         // show form edit
         $courses = Course::all();
         return view('edit', compact('student', 'courses', 'pageIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        // pageIndex
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // echo $pageIndex;
        // update
        $student->update($request->all());
        return redirect()->route('students.index', ['pageIndex' => $pageIndex])->with('mes', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student , Request $request)
    {
        //
         //
         $pageIndex = 1;
         if($request->has('pageIndex'))  $pageIndex = $request->input('pageIndex');
         $student->delete();
         return redirect()->route('students.index', ['pageIndex' => $pageIndex])->with('mes', 'Xóa thành công');
    }
}
