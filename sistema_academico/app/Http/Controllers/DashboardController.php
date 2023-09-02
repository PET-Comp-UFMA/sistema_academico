<?php
 
namespace App\Http\Controllers;

use App\Models\School;
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
        $perfil = session('perfil');
        if ($perfil == 'admin' && $user->admin) {
            $schools = School::all();
            return view('dashboard.dashboard_adm', ['schools' => $schools]);
        }elseif ($perfil == 'student' && $user->student) {
            return view('dashboard.dashboard_student');
        } elseif ($perfil == 'teacher' && $user->teacher) {
            return view('dashboard.dashboard_teacher');
        } else {
            return redirect()->back()->with('error', 'Perfil não corresponde ao usuario');
        }
    }
}