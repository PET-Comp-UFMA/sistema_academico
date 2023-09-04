<?php
 
namespace App\Http\Controllers\Student;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InsertStudentsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   
        return view('forms.student.insertStudent');
    }

    public function store(Request $request)
    {   
        $nome = $request->input('nome');
        $email = $request->input('email');
        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:users,email',
        ], [
            'required' => 'O campo nome é obrigatório.',
            'email.unique' => 'Este email já está em uso.',
        ]);
        // Se não existir, crie e salve o novo professor
        $user = new User([
            'nome' => $nome,
            'email' => $email,
            'telefone' => '99925505',
            'password' => Hash::make($request->input('password'))
        ]);
        $user->save();

        $student= new Student(['user_id' => $user->id]);
        $student->save();
     
        return redirect()->route('adm-estudante')->with('success', 'Dados salvos com sucesso.');
    }
}