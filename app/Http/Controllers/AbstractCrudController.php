<?php

namespace Iluminacao\Http\Controllers;

use Illuminate\Http\Request;

use Iluminacao\Http\Requests;

class AbstractCrudController extends Controller
{
    protected $view;
    protected $model;

    public function create()
    {
        return view($this->view.'.create');
    }

    public function grid()
    {
        $data = $this->model->orderBy('id')->get();

        return view($this->view.'.grid', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        return view($this->view.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->model->find($id)->update($request->all());

        return redirect()->route($this->route.'.grid');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();

        return redirect()->route($this->route.'.grid');
    }

    public function store(Request $request)
    {
        $this->model->create($request->all());

        return redirect()->route($this->route.'.grid');
    }
}
