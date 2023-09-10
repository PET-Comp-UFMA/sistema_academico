<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;

class ManagerStudentsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   
        $students = Student::all();  
        return view('manage.manage_students',[
            'students'=>$students
        ]);
    }
    
}