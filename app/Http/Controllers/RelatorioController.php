<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Http\Requests;
use Iluminacao\Http\Services\RelatoriosService;

class RelatorioController extends Controller
{
    protected $relatorio_service;

    public function __construct(RelatoriosService $relatorio_service)
    {
        $this->relatorio_service = $relatorio_service;
    }

    public function indexRelatorioContato()
    {
        $contatos = false;

        return view('admin.relatorios.contato', compact('contatos'));
    }

    public function relatorioContatos(Request $request)
    {
        $contatos = $this->relatorio_service->relatorioContatos($request->get('data_inicial'), $request->get('data_final'));

        $datas['data_inicial'] = $request->get('data_inicial');
        $datas['data_final'] = $request->get('data_final');

        return view('admin.relatorios.contato', compact('contatos', 'datas'));
    }
}
