<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:users,email',
        ], [
            'required' => 'Campo obrigatório não preenchido.',
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

        $teacher = new Teacher(['user_id' => $user->id]);
        $teacher->save();
     
        return redirect()->route('adm-professor')->with('success', 'Dados salvos com sucesso.');
    }
}