<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name' => 'required',
            'username' => 'nullable',
            'headline' => 'nullable',
            'image' => 'nullable',
            'email' => 'required',
            'mobile' => 'nullable',
            'website' => 'nullable',
            'linkedin' => 'nullable',
            'telegram' => 'nullable',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
        ];
    }
}
