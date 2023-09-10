<?php
 
namespace App\Http\Controllers\Student;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
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
        $schools = School::all();
        return view('forms.student.insertStudent',[
            'schools'=>$schools
        ]);
    }

    public function store(Request $request)
    {   
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmedPassword = $request->input('confirmed-password');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $school = $request->input('school');

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirmed-password' => 'required|same:password',
            'school' => 'required',
        ], [
            'required' => 'Campo obrigatório não preenchido.',
            'same' => 'Senhas não correspondem',
            'email.unique' => 'Este email já está em uso.',
        ]);

        $user = new User([
            'nome' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'endereco' => $address,
            'telefone' => $phone,
        ]);
        $user->save();

        $student = null;
        if ($user) {
            $student= new Student([
                'user_id' => $user->id,
                'escola_id' => $school,

            ]);
            $student->save();
        }

        if ($user && $student) {
            return redirect()->route('adm-estudante')->with('success', 'Dados salvos com sucesso.');
        } else {
            // Redirecionar em caso de erro
            return redirect()->back()->with('error', 'Erro ao criar professor.');
        }
    }
}