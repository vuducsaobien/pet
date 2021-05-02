<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
{
    private $table = 'route';
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
        $task = "add";


        switch ($task) {
            case 'add':
                $condLevel      = 'bail|in:admin,member';
                $condAvatar     = 'bail|required|image|max:500';
                break;
            case 'edit-info':
                $condEmail      = "bail|required|email|unique:$this->table,email,$id";
                break;
            case 'change-password':
                $condPass = "bail|required|between:1,100|confirmed";

                break;
            case 'change-level':
                $condLevel = 'bail|in:admin,member';
                break;
            case 'change-logged-password':
                $condOldPass    = "bail|required|between:5,100";
                $condPass       = 'bail|required|between:5,100|confirmed';
                break;
            default:
                break;
        }
        
        return [
            // 'username' => $condUserName,
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
