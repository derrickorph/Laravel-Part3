<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function fetchStudents()
    {
        // $students= Student::all();
        // $students= Student::where('id',3)->get();
        // $students= Student::whereBetween('id',[33,44])->get();
        $students= Student::whereBetween('id',[33,44])->orderBy('id','DESC')->get();
        return $students;
    }
}
