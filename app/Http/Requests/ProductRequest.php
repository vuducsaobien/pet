<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private $table            = 'product';
    /**
     * Determine if the product is authorized to make this request.
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
        $id   = $this->id;
        $all  = $this->all();
        $task = "add";

        $condName = $condThumb = $condCategory = $condPrice = $condStatus = $condPriceSale = '';

        if( !empty( $this->task_change ) ){
            $task = $this->task_change;
        }

        switch ($task) {
            case 'add':
                $condName     = "bail|required|unique:$this->table,name";
                $condPrice    = "bail|required";
                $condCategory = "bail|required";
                break;

            case 'change-general':
                $condName = "bail|required";
                break;

            case 'change-special':
                $condStatus = "bail|in:active,inactive";
                break;

            case 'change-dropzone':
                break;

            case 'change-price':
                $condPrice     = "bail|required";
                $condPriceSale = "bail|required";
                break;

            case 'change-category':
                break;

            case 'change-seo':
                break;
        }

        // echo '<pre style="color:red";>$task === '; print_r($task);echo '</pre>';
        // echo '<pre style="color:red";>$all === '; print_r($all);echo '</pre>';
        // echo '<h3>Die is 11 Called </h3>';die;

        return [
            'name'        => $condName,
            'status'      => $condStatus,
            'thumb'       => $condThumb,
            'price'       => $condPrice,
            'category_id' => $condCategory,
            'price_sale'  => $condPriceSale

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
