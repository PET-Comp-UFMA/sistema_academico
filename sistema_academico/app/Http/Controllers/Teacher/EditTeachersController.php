<?php
 
namespace App\Http\Controllers\Teacher;
 
use Illuminate\Http\Request;
use App\Models\Teacher;
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
        return view('forms.teacher.editTeacher', ['teacher'=>$teacher]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $teacher = Teacher::find($id);
        $teacher->user->nome =  $request->input('nome');
        $teacher->user->email =  $request->input('email');
        $teacher->user->password = Hash::make($request->input('password'));

        $teacher->save();
        $teacher->user->save();
        return redirect()->route('adm-professor')->with('success', 'Dados salvos com sucesso.'); 
    }
}