<?php
 
namespace App\Http\Controllers\School;
 
use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Controllers\Controller;

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
        return view('forms.school.insertSchool');
    }

    public function store(Request $request)
    {   
        $nome = $request->input('nome');

        // Verificar se já existe uma escola com o mesmo nome
        if (School::where('nome', $nome)->exists()) {
            return redirect()->route('adm-escola')->with('error', 'Já existe uma escola com este nome.');
        }

        // Se não existir, crie e salve a nova escola
        $school = new School([
            'nome' => $nome,
            'endereco' => $request->input('endereco'),
        ]);

        $school->save();

        return redirect()->route('adm-escola')->with('success', 'Dados salvos com sucesso.');

    }
}