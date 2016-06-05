<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Exceptions\RedirectBackWithErrorException;
use Iluminacao\Http\Requests;
use Iluminacao\Models\Categoria;

class CategoriaController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    public function __construct(Categoria $model_categoria)
    {
        $this->view = 'admin.cadastros.categoria';
        $this->route = 'admin.cadastros.categoria';
        $this->model = $model_categoria;
    }

    /*
     * @override
     * */
    public function destroy($id)
    {

        $categoria = $this->model->find($id);

        if($categoria->produtos()->first()) {

            throw new RedirectBackWithErrorException('A categoria selecionada possui produtos vinculados. Para excluí-la, primeiro exclua todos os produtos vinculados a esta categoria');
        }

        $categoria->delete();

        return redirect()->route($this->route.'.grid');
    }
}
