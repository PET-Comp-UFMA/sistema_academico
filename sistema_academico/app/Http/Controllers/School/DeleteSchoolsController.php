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
    
        $school = School::find($id);
    
        if (!$school) {
            return redirect()->route('adm-escola')->with('error', 'Escola não encontrada.');
        }
    
        $nomeEscola = $request->input('nome');
    
        if ($school->nome === $nomeEscola) {
            try {
                $school->delete();
                return redirect()->route('adm-escola')->with('success', 'Escola excluída com sucesso.');
            } catch (\Throwable $th) {
                return redirect()->route('adm-escola')->with('error', 'Escola não pode ser excluída');
            }
        } else {
            return redirect()->route('adm-escola')->with('error', 'O nome da escola não corresponde ao registro.');
        }
    }
}