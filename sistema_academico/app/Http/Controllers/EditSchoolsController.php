<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;
use App\Models\School;

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
        return view('forms.editSchool', ['school'=>$school]);
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