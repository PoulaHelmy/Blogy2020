<?php

namespace App\Http\Requests\BackEnd\Photos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'src' => ['required' ,'min:10'],
            'photoable_type'=>['required'],
            'photoable_id'=>['required'],

        ];
    }
}
