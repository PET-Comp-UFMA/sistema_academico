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
        ]);
        
        $teacher = Teacher::find($id);
        $nome = $request->input('nome');
        
        if ($teacher && $teacher->user->nome === $nome) {
            $teacher->delete();
            $teacher->user->delete();
            return redirect()->route('adm-professor')->with('success', 'Professor excluído com sucesso.');
        } else {
            return redirect()->route('adm-professor')->with('error', 'Não foi possível excluir o professor.');
        }
    }
}