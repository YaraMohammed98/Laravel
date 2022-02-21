<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Models\post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            
            'description' => ['required', 'min:10'], 
            'post_creator' => ['required','exists:users,id'], //prevent from inspects hacks
        ];

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */

    public function messages()
    {
      return [
             'title.required' =>'You must Enter a title :( ',
             'title.min' =>'Title should be more than 3 character :( ',
             'description.min' =>'description should be more than 10 character :( ',
             'description.required' =>'You must Enter a description :( ',
             'post_creator.required'=>'You must choose a post creator',
             'post_creator.exists'=>'I got you, Stop doing this -_-',
         ];
    }

}
