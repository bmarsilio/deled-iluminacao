<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Iluminacao\Http\Requests;
use Iluminacao\Models\Contato;

class ContatoController extends Controller
{
    protected $model;

    public function __construct(Contato $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('contato.index');
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        unset($dados['_token']);

        $this->model->firstOrCreate($dados);

        Session::flash('obrigado', true);

        return redirect()->route('contato.obrigado');
    }

    public function obrigado()
    {
        return view('home.partial.obrigado-contato');
    }

}
