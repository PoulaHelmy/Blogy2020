<?php

namespace App\Http\Requests\BackEnd\Posts;

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
            'name'=>'required|unique:posts|max:191',
            'des'=>'required',
            'content'=>'required',
            'cat_id' => ['required'  ,'integer' ],
            'image'=>['required','image' ]
        ];
    }
}
