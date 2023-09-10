<?php
 
namespace App\Http\Controllers\Student;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
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
        $schools = School::all();
        return view('forms.student.editStudent', [
            'student'=>$student,
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
            'school' => 'required'
        ], [
            'required' => 'Campo obrigatório não preenchido.',
        ]);

        $student = Student::find($id);
        $student->user->nome =  $name;
        $student->user->email =  $email;
        $student->user->endereco =  $address;
        $student->user->telefone =  $phone;
        $student->escola_id =  $school;
        $student->save();
        $student->user->save();

        return redirect()->route('adm-estudante')->with('success', 'Dados salvos com sucesso.'); 
    }
}