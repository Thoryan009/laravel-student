<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepo;

    public function __construct(StudentRepositoryInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function index()
    {
        // $student = Student::where('name', $request->student_name)->get();
        return view('admin.student.manage');
    }
    public function searchByname(Request $request)
    {
        
        $student = Student::where('name', $request->student_name)->get();
        return view('admin.student.manage', ['student' => $student ]);
    }

    
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->studentRepo->create($request);
        // Student::newStudent($request);
        return back()->with('message', 'New Student Info added...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', ['student' => $this->studentRepo->show($student)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $this->studentRepo->update( $student, $request);
        return redirect('/students')->with('message', 'Student Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->studentRepo->delete($student);
        return back()->with('message', 'Student Info deleted Successfully');
    }
}
