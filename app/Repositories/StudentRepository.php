<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function create($request)
    {
      return  Student::newStudent($request);
    }
    public function showAll()
    {
        return Student::latest();
    }
    public function show($student)
    {
        return Student::find($student->id);
    }
    public function update($id, $request)
    {
        return Student::updateStudent($id->id, $request);
    }
    public function delete($id )
    {
        return Student::deleteStudent($id->id);
    }
    public function searchByName($request)
    {
        return Student::where('name','like', "%{$request->student_name}%")->orWhere('email', 'like', "%{$request->student_name}%")->paginate(2);
    }
}