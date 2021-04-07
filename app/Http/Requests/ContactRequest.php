<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    private $table            = 'contact';
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
        $id = $this->id;

        $condThumb = 'bail|required|max:500';
        $condName  = "bail|required|between:5,100|unique:$this->table,name";

        if(!empty($id)){ // edit
            $condThumb = 'required';
            $condName  .= ",$id";
        }
        return [
            'message' => 'bail|required',
            'email' => 'bail|required',
            'name' => 'bail|required',
            'subject' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
            // 'name.min'      => 'Name :input chiều dài phải có ít nhất :min ký tứ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}
