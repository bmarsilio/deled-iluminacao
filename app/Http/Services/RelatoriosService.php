<?php

namespace Iluminacao\Http\Services;

use Iluminacao\Http\Repositories\RelatoriosRepository;

class RelatoriosService
{
    protected $relatorios_repository;

    public function __construct(RelatoriosRepository $relatorios_repository)
    {
        $this->relatorios_repository = $relatorios_repository;
    }

    public function relatorioContatos($data_inicial, $data_final)
    {
        return $this->relatorios_repository->contatosPorData($data_inicial, $data_final);
    }

}