<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Http\Requests;
use Iluminacao\Models\RedeSocial;

class RedeSocialController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    public function __construct(RedeSocial $model_rede_social)
    {
        $this->view = 'admin.cadastros.rede-social';
        $this->route = 'admin.cadastros.rede-social';
        $this->model = $model_rede_social;
    }

    public function getRedesSociais()
    {
        return $this->model->all();
    }
}
