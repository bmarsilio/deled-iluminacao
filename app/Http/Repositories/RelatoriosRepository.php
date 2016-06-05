<?php

namespace Iluminacao\Http\Repositories;


use Illuminate\Support\Facades\DB;

class RelatoriosRepository
{
    public function contatosPorData($data_inicial, $data_final)
    {
        $sql = '
            SELECT
                A.nome,
                A.email,
                A.telefone,
                A.mensagem,
                A.created_at AS data_contato
            FROM
                il_contato A
            WHERE
                A.created_at BETWEEN ? AND ?
        ';

        return DB::select($sql, [$data_inicial, $data_final]);
    }
}