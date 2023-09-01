<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {   
       
        $user = auth()->user(); // Obtém o usuário autenticado
        if ($user->admin) {
            $schools = DB::table('schools')->get();
            return view('dashboard.dashboard_adm', ['schools'=>$schools]);
        }elseif ($user->student) {
            return view('dashboard.dashboard_student');
        }
        
    }
}