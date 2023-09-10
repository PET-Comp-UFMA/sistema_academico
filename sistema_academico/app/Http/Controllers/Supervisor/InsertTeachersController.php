<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Supervisor;
use App\Models\School;
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
        $schools = School::all();
        return view('forms.teacher.insertTeacher', ['schools'=>$schools]);
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
        $isSupervisor = $request->input('supervisor');

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirmed-password' => 'required|same:password',
            'school' => 'required',
            'supervisor' => 'required'
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

        $teacher = null;
        $supervisor = null;

        if ($user) {
            $teacher = new Teacher([
                'user_id' => $user->id,
                'escola_id' => $school,
            ]);
            $teacher->save();
        }

        if ($teacher && $isSupervisor == 'yes') {
            $supervisor = new Supervisor([
                'professor_id' => $teacher->id
            ]);
            $supervisor->save();
        }

        if ($user && $teacher && (!$supervisor || $supervisor->id)) {
            return redirect()->route('adm-professor')->with('success', 'Dados salvos com sucesso.');
        } else {
            // Redirecionar em caso de erro
            return redirect()->back()->with('error', 'Erro ao criar professor.');
        }

    }
}