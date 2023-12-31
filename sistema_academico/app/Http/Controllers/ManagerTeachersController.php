<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\Teacher;

class ManagerTeachersController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   
        $teachers = Teacher::all();
        return view('manage.manage_teachers',['teachers'=>$teachers]);
    }
    
}