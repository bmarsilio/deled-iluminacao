<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Iluminacao\Http\Requests;
use Iluminacao\Http\Requests\BannerRequest;
use Iluminacao\Models\Banner;

class BannersController extends AbstractCrudController
{
    protected $view;
    protected $route;
    protected $model;

    public function __construct(Banner $model_banner)
    {
        $this->view = 'admin.cadastros.banners';
        $this->route = 'admin.cadastros.banners';
        $this->model = $model_banner;
    }


    /*
     * @override
     * */
    public function storeBanner(BannerRequest $request)
    {
        $arquivo = $request->file('imagem');

        $extensao = $arquivo->getClientOriginalExtension();

        $imagem = $this->model->create(['extensao' => $extensao, 'ordem' => $request->get('ordem')]);

        Storage::disk('public_local')->put('banners/banner_'.$imagem->id.'.'.$extensao, File::get($arquivo));

        return redirect()->route('admin.cadastros.banners.grid');
    }

    public function destroyBanner($id)
    {
        $imagem = $this->model->find($id);

        if(file_exists(public_path().'/uploads/banners/banner_'.$imagem->id.'.'.$imagem->extensao))
        {
            Storage::disk('public_local')->delete('banners/banner_'.$imagem->id.'.'.$imagem->extensao);
        }

        $imagem->update(['ativo' => false]);
        $imagem->delete();

        return redirect()->route('admin.cadastros.banners.grid');
    }
}
