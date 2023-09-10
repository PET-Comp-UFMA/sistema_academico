<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Controllers\Controller;

class DeleteTeachersController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, string $id )
    {   
        $teacher = Teacher::find($id);
        return view('forms.teacher.deleteTeacher', ['teacher'=>$teacher]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
        ], [
            'required' => 'Campo obrigatório não preenchido.',
        ]);
        
        $teacher = Teacher::find($id);
        $nome = $request->input('nome');
        
        if ($teacher && $teacher->user->nome === $nome) {
            try {
                $teacher->user->delete();
                $teacher->delete();
                return redirect()->route('adm-professor')->with('success', 'Professor excluído com sucesso.');
            } catch (\Throwable $th) {
                return redirect()->route('adm-professor')->with('error', 'Professor não pode ser excluído pois ele é supervisor.');
            }
        } else {
            return redirect()->route('adm-professor')->with('error', 'Não foi possível excluir o professor.');
        }
    }
}