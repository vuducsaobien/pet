<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RssRequest extends FormRequest
{
    private $table = 'rss';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->id;
        $source = implode(',', array_keys(config('zvn.template.rss_source')));

        $condName = "bail|required|between:5,100|unique:$this->table,name";
        $condSource = "bail|in:$source";

        if (!empty($id)) {
            $condName .= ",$id";
        }

        return [
            'name'          => $condName,
            'link'          => 'bail|required|min:5|url',
            'status'        => 'bail|in:active,inactive',
            'source'        => $condSource,
        ];
    }
}
