<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    private $table = 'menu';
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
        $typeMenu = implode(',', array_keys(config('zvn.template.type_menu')));
        $typeLink = implode(',', array_keys(config('zvn.template.type_link')));

        $condName = "bail|required|max:100|unique:$this->table,name";
        $condTypeMenu = "bail|in:$typeMenu";
        $condTypeLink = "bail|in:$typeLink";

        if (!empty($id)) {
            $condName .= ",$id";
        }

        return [
            'name'      => $condName,
            'link'      => 'bail|required',
            'status'    => 'bail|in:active,inactive',
            'type_menu' => $condTypeMenu,
            'type_link' => $condTypeLink
        ];
    }
}
