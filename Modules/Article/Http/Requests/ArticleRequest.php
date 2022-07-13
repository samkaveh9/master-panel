<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        if ($this->request == "post"){
            return [
                'title' => 'required|string|min:3',
                'slug' => 'nullable',
                'banner' => 'required',
                'content' => 'required'
            ];
        }else{
            return [
                'title' => 'required|string|min:3',
                'banner' => 'nullable',
                'content' => 'required'
            ];
        }
    }
}
