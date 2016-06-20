<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Iluminacao\Exceptions\RedirectBackWithErrorException;
use Iluminacao\Http\Requests;
use Iluminacao\Models\ItemHomeImagem;
use Iluminacao\Models\Banner;
use Iluminacao\Models\ItemHome;
use Iluminacao\Models\Noticia;

class HomeController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    protected $model_banner;
    protected $model_item_home;
    protected $model_categoria;
    protected $model_item_home_imagem;
    protected $model_noticia;

    public function __construct(ItemHome $model_item_home, Banner $model_banner, ItemHomeImagem $model_item_home_imagem, Noticia $model_noticia)
    {
        $this->view = 'admin.cadastros.home';
        $this->route = 'admin.cadastros.home';
        $this->model = $model_item_home;

        $this->model_banner = $model_banner;
        $this->model_item_home = $model_item_home;
        $this->model_item_home_imagem = $model_item_home_imagem;
        $this->model_noticia = $model_noticia;
    }

    public function index()
    {
        $banners = $this->getBanners();
        $ultimas_noticias = $this->getUltimasNoticias();

        return view('home.index', compact('banners', 'ultimas_noticias'));
    }

    public function getBanners()
    {
        return $this->model_banner->orderBy('ordem')->get();;
    }

    public function getUltimasNoticias()
    {
        return $this->model_noticia->take(3)->get();
    }

    /*
 * @override
 * */
    public function destroy($id)
    {
        $item_home = $this->model->find($id);

        if($item_home->imagens()->first()) {

            throw new RedirectBackWithErrorException('O item selecionado possui imagens vinculadas. Para excluí-lo, primeiro exclua todas as imagens vinculadas a este item.');
        }

        $this->model->find($id)->delete();

        return redirect()->route($this->route.'.grid');
    }

    public function imagens($item_home_id)
    {
        $item_home = $this->model->find($item_home_id);

        return view($this->route.'.imagens', compact('item_home'));
    }


    public function createImagem($item_home_id)
    {
        $item_home = $this->model->find($item_home_id);

        return view($this->route.'.create_imagem', compact('item_home'));
    }

    public function storeImagem(Request $request, $id)
    {
        $arquivo = $request->file('imagem');

        $extensao = $arquivo->getClientOriginalExtension();

        $imagem = $this->model_item_home_imagem->create([
            'item_home_id' => $id,
            'extensao' => $extensao
        ]);

        Storage::disk('public_local')->put('itens_home/item_home_'.$imagem->id.'.'.$extensao, File::get($arquivo));

        return redirect()->route($this->route.'.imagens', ['id' => $id]);
    }

    public function destroyImagem($id)
    {
        $imagem = $this->model_item_home_imagem->find($id);

        if(file_exists(public_path().'/uploads/itens_home/item_home_'.$imagem->id.'.'.$imagem->extensao))
        {
            Storage::disk('public_local')->delete('itens_home/item_home_'.$imagem->id.'.'.$imagem->extensao);
        }

        $item_home = $imagem->itemHome;

        $imagem->delete();

        return redirect()->route($this->route.'.imagens', ['id' => $item_home->id]);
    }
}
