<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class InsertSchoolsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   
        return view('forms.insertSchool');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
        ]);

        $school = new School([
            'nome' => $request->input('nome'),
            'endereco' => $request->input('endereco'),
        ]);

        $school->save();
        return redirect()->route('adm-escola')->with('success', 'Dados salvos com sucesso.'); 
    }
}