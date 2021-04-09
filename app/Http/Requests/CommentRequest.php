<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    private $table       = 'comment';
    private $tableParent = 'product';

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
        $id  = $this->id;
        
        $condName  = "bail|required";

        if(!empty($id)){ // edit
            $condName  .= "|unique:$this->table,$id";
        }
        return [
            'name'         => $condName,
            'email'        => 'bail|required|email',
            'product_code' => "bail|required|exists:$this->tableParent,product_code",
            'star'         => 'bail|required|in:5,4,3,2,1',
            'message'      => 'bail|required',
            'status'       => 'bail|in:active,inactive',
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
