<?php
 
namespace App\Http\Controllers\School;
 
use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Controllers\Controller;

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
        return view('forms.school.deleteSchool', ['school'=>$school]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
        ], [
            'required' => 'Campo obrigatório não preenchido.',
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