<?php
 
namespace App\Http\Controllers\Student;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditStudentsController extends Controller
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
        return view('forms.student.editStudent', ['student'=>$student]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $student = Student::find($id);
        $student->user->nome =  $request->input('nome');
        $student->user->email =  $request->input('email');
        $student->user->password = Hash::make($request->input('password'));

        $student->save();
        $student->user->save();
        return redirect()->route('adm-estudante')->with('success', 'Dados salvos com sucesso.'); 
    }
}