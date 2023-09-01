<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

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
            return view('dashboard.dashboard_adm');
        }elseif ($user->student) {
            return view('dashboard.dashboard_student');
        }
        
    }
}