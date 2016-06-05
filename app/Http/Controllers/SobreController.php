<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Http\Requests;
use Iluminacao\Models\ItemHome;

class SobreController extends Controller
{
    protected $model_item_home;

    public function __construct(ItemHome $model_item_home)
    {
        $this->model_item_home = $model_item_home;
    }

    public function index()
    {
        $itens_home = $this->getItems();

        return view('sobre.index', compact('itens_home'));
    }

    public function getItems()
    {
        return $this->model_item_home->all();
    }
}
