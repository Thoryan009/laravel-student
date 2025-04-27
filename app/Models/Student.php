<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    public static $student;

    public static function newStudent($request)
    {
            self::$student                  = new Student();
            self::$student->name            = $request->name;
            self::$student->email           = $request->email;
            self::$student->phone           = $request->number;
            self::$student->date_of_birth   = $request->date_of_birth;
            self::$student->save();

    }
    public static function updateStudent($id, $request)
    {
           self::$student = Student::find($id) ;

           self::$student->name            = $request->name;
           self::$student->email           = $request->email;
           self::$student->phone           = $request->number;
           self::$student->date_of_birth   = $request->date_of_birth;
           self::$student->save();
    }

    public static function deleteStudent($id)
    {
            self::$student = Student::find($id);
            self::$student->delete();
    }

}
