<?php

namespace Iluminacao\Http\Requests;

use Iluminacao\Http\Requests\Request;

class BannerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->merge(['ativo' => $this->input('ativo', null)]);
        $this->merge(['cores' => $this->input('cores', null)]);
        $this->merge(['tamanhos' => $this->input('tamanhos', null)]);

        return [
            'imagem' => 'required|max:1500|image'
        ];
    }

    public function messages()
    {
        return [
            'max' => 'O tamanho do arquivo excede o limite de (1,5Mb)',
            'required' => 'Existem campos importantes que não foram preenchidos',
            'image' => 'O arquivo que você tentou enviar não é uma imagem'
        ];
    }
}
