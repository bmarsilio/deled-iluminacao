<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Iluminacao\Exceptions\RedirectBackWithErrorException;
use Iluminacao\Http\Requests;
use Iluminacao\Models\Noticia;
use Iluminacao\Models\NoticiaImagem;

class NoticiaController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    protected $model_noticia_imagem;

    public function __construct(Noticia $model_noticia, NoticiaImagem $model_noticia_imagem)
    {
        $this->view = 'admin.cadastros.noticia';
        $this->route = 'admin.cadastros.noticia';
        $this->model = $model_noticia;

        $this->model_noticia_imagem = $model_noticia_imagem;
    }

    public function index()
    {
        $noticias = $this->getNoticias();

        return view('noticias.index', compact('noticias'));
    }

    public function showNoticia($noticia_id)
    {
        $noticia = $this->model->find($noticia_id);

        if(!$noticia) {
            abort(404);
        }

        return view('noticias.noticia', compact('noticia'));
    }

    public function getNoticias()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    /*
     * @override
     * */
    public function destroy($id)
    {
        $noticia = $this->model->find($id);

        if($noticia->imagens()->first()) {

            throw new RedirectBackWithErrorException('A notícia selecionada possui imagens vinculadas. Para excluí-la, primeiro exclua todas as imagens vinculadas a esta notícia.');
        }

        $this->model->find($id)->delete();

        return redirect()->route($this->route.'.grid');
    }

    public function imagens($noticia_id)
    {
        $noticia = $this->model->find($noticia_id);

        return view($this->route.'.imagens', compact('noticia'));
    }


    public function createImagem($noticia_id)
    {
        $noticia = $this->model->find($noticia_id);

        return view($this->route.'.create_imagem', compact('noticia'));
    }

    public function storeImagem(Request $request, $id)
    {
        $arquivo = $request->file('imagem');

        $extensao = $arquivo->getClientOriginalExtension();

        $imagem = $this->model_noticia_imagem->create([
            'noticia_id' => $id,
            'extensao' => $extensao
        ]);

        Storage::disk('public_local')->put('noticias/noticia_'.$imagem->id.'.'.$extensao, File::get($arquivo));

        return redirect()->route($this->route.'.imagens', ['id' => $id]);
    }

    public function destroyImagem($id)
    {
        $imagem = $this->model_noticia_imagem->find($id);

        if(file_exists(public_path().'/uploads/noticias/noticia_'.$imagem->id.'.'.$imagem->extensao))
        {
            Storage::disk('public_local')->delete('noticias/noticia_'.$imagem->id.'.'.$imagem->extensao);
        }

        $noticia = $imagem->noticia;

        $imagem->delete();

        return redirect()->route($this->route.'.imagens', ['id' => $noticia->id]);
    }
}
