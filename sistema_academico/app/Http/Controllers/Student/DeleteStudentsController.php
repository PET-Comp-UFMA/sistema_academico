<?php
 
namespace App\Http\Controllers\Student;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;

class DeleteStudentsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, string $id )
    {   
        $student = Student::find($id);
        return view('forms.student.deleteStudent', ['student'=>$student]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
        ], [
            'required' => 'Campo obrigatório não preenchido.'
        ]);
        $nome = $request->input('nome');
        
        $student = Student::find($id);
      
        if ($student && $student->user->nome === $nome) {
            $student->delete();
            $student->user->delete();
            return redirect()->route('adm-estudante')->with('success', 'Aluno excluído com sucesso.');
        } else {
            return redirect()->route('adm-estudante')->with('error', 'Não foi possível excluir o aluno.');
        }
    }
}