<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Controllers\Controller;

class InsertTeachersController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   
        return view('forms.teacher.insertTeacher');
    }

    public function store(Request $request)
    {   
        $nome = $request->input('nome');
        $email = $request->input('email');

        // Verificar se já existe um professor com o mesmo nome
        if (Teacher::where('nome', $nome)->exists()) {
            return redirect()->route('adm-professor')->with('error', 'Já existe um professor com este nome.');
        }

        // Verificar se já existe um professor com o mesmo email
        if (Teacher::where('email', $email)->exists()) {
            return redirect()->route('adm-professor')->with('error', 'Já existe um professor com este email.');
        }

        // Se não existir, crie e salve o novo professor
        $teacher = new Teacher([
            'nome' => $nome,
            'email' => $email,
            'password' => password_hash($request->input('password')),
        ]);

        $teacher->save();

        return redirect()->route('adm-professor')->with('success', 'Dados salvos com sucesso.');

    }
}