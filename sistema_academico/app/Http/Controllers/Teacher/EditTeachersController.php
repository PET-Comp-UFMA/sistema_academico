<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditTeachersController extends Controller
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
        $schools = School::all();
        return view('forms.teacher.editTeacher', [
            'teacher'=>$teacher,
            'schools'=>$schools
        ]);
    }

    public function edit(Request $request, string $id)
    {   
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $school = $request->input('school');
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'school' => 'required',
            'supervisor' => 'required'
        ], [
            'required' => 'Campo obrigatório não preenchido.'
        ]);

        $teacher = Teacher::find($id);
        $teacher->user->nome =  $name;
        $teacher->user->email =  $email;
        $teacher->user->endereco =  $address;
        $teacher->user->telefone =  $phone;
        $teacher->escola_id =  $school;
        $teacher->save();
        $teacher->user->save();
        return redirect()->route('adm-professor')->with('success', 'Dados salvos com sucesso.'); 
    }
}