<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        //  $post = $this->route('Post');
        return [
            //
           // 'title' =>['required',"unique:posts,title,{$this->post->id}",'min:3'],
           'title' => [
            'required',
            'min:3',
            Rule::unique('posts', 'title')->ignore($this->post)
           ],
            'description'=>['required','min:10'],
            'user_name' => ['exists:users,name']
        ];
    }
    public function messages()
    {
        return [
        'user_name.exists' => 'Invalid user',
        
       ];
    }
}
