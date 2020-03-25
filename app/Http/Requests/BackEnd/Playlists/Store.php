<?php

namespace App\Http\Requests\BackEnd\Playlists;

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
            'name' => ['required', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_des' => ['required' ,'required'],
            'des' => ['required' , 'min:10'],
            'cat_id' => ['required'  ,'integer' ],
            'published' => ['required' ],
            'image'=>['required','image' ],
            'level'=>['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'cat_id.required' => 'A Category is required',
        ];
    }
}
