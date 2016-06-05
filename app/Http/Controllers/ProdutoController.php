<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Iluminacao\Exceptions\RedirectBackWithErrorException;
use Iluminacao\Http\Requests;
use Iluminacao\Models\Categoria;
use Iluminacao\Models\Produto;
use Iluminacao\Models\ProdutoImagem;

class ProdutoController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    protected $model_categoria;
    protected $model_produto_imagem;

    public function __construct(Produto $model_produto, Categoria $model_categoria, ProdutoImagem $model_produto_imagem)
    {
        $this->view = 'admin.cadastros.produto';
        $this->route = 'admin.cadastros.produto';
        $this->model = $model_produto;

        $this->model_categoria = $model_categoria;
        $this->model_produto_imagem = $model_produto_imagem;
    }

    /*
     * override
     * */
    public function create()
    {
        $categorias = $this->getCategorias();

        return view($this->view.'.create', compact('categorias'));
    }

    /*
     * @override
     * */
    public function edit($id)
    {
        $categorias = $this->getCategorias();
        $data = $this->model->find($id);

        return view($this->view.'.edit', compact('data', 'categorias'));
    }

    /*
     * @override
     * */
    public function destroy($id)
    {
        $produto = $this->model->find($id);

        if($produto->imagens()->first()) {

            throw new RedirectBackWithErrorException('O produto selecionado possui imagens vinculadas. Para excluí-lo, primeiro exclua todas as imagens vinculadas a este produto');
        }

        $this->model->find($id)->delete();

        return redirect()->route($this->route.'.grid');
    }

    public function imagens($produto_id)
    {
        $produto = $this->model->find($produto_id);

        return view($this->route.'.imagens', compact('produto'));
    }


    public function createImagem($produto_id)
    {
        $produto = $this->model->find($produto_id);

        return view($this->route.'.create_imagem', compact('produto'));
    }

    public function storeImagem(Request $request, $id)
    {
        $arquivo = $request->file('imagem');

        $extensao = $arquivo->getClientOriginalExtension();

        $imagem = $this->model_produto_imagem->create([
            'produto_id' => $id,
            'extensao' => $extensao
        ]);

        Storage::disk('public_local')->put('produtos/produto_'.$imagem->id.'.'.$extensao, File::get($arquivo));

        return redirect()->route($this->route.'.imagens', ['id' => $id]);
    }

    public function destroyImagem($id)
    {
        $imagem = $this->model_produto_imagem->find($id);

        if(file_exists(public_path().'/uploads/produtos/produto_'.$imagem->id.'.'.$imagem->extensao))
        {
            Storage::disk('public_local')->delete('produtos/produto_'.$imagem->id.'.'.$imagem->extensao);
        }

        $produto = $imagem->produto;

        $imagem->delete();

        return redirect()->route($this->route.'.imagens', ['id' => $produto->id]);
    }

    public function getCategorias()
    {
        return $this->model_categoria->all();
    }
}
