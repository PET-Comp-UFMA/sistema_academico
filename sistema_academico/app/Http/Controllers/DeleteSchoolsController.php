<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class DeleteSchoolsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, string $id )
    {   
        $school = School::find($id);
        return view('forms.deleteSchool', ['school'=>$school]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
        ]);
        
        $nomeEscola = $request->input('nome');
        $school = School::find($id);
        
        if ($school && $school->nome === $nomeEscola) {
            $school->delete();
            return redirect()->route('adm-escola')->with('success', 'Escola excluída com sucesso.');
        } else {
            return redirect()->route('adm-escola')->with('error', 'Não foi possível excluir a escola.');
        }
    }
}