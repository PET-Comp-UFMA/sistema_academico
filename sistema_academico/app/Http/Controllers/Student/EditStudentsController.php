<?php
 
namespace App\Http\Controllers\School;
 
use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Controllers\Controller;

class EditSchoolsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, string $id )
    {   
        $school = School::find($id);
        return view('forms.school.editSchool', ['school'=>$school]);
    }

    public function edit(Request $request, string $id)
    {   
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
        ]);

        $school = School::find($id);
        $school->nome =  $request->input('nome');
        $school->endereco =  $request->input('endereco');

        $school->save();
        return redirect()->route('adm-escola')->with('success', 'Dados salvos com sucesso.'); 
    }
}