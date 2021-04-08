<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    private $table            = 'discount';
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
        $id          = $this->id;
        $all         = $this->all();
        $price       = $this->price;
        $percent     = $this->percent;
        $min_price   = $this->min_price;
        $max_price   = $this->max_price;
        $max_price   = $this->max_price;
        // $total_times = $this->total_times;
        // $date_start  = $this->date_start;
        // $date_end    = $this->date_end;

        $condName     = "bail|required|between:1,100|unique:$this->table,code";
        $condPrice    = 'bail|required_without:percent';
        $condPercent  = 'bail|required_without:price';
        $condPriceMin = 'bail';
        $condPriceMax = 'bail';

        if( ! empty($price) ) $condPrice        .= '|numeric|integer';
        if( ! empty($percent) ) $condPercent    .= '|numeric|integer|between:0,100';
        if( ! empty($min_price) ) $condPriceMin .= '|numeric|integer|min:0|lt:max_price';
        if( ! empty($max_price) ) $condPriceMax .= '|numeric|integer|min:0';

        if(!empty($id)){ // edit
            $condName  .= ",$id";
        }

        // echo '<pre style="color:red";>$all === '; print_r($all);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        return [
            'code'        => $condName,
            'price'       => $condPrice,
            'percent'     => $condPercent,
            'min_price'   => $condPriceMin,
            'max_price'   => $condPriceMax,
            'total_times' => 'bail|required|numeric|integer|min:0',
            'date_start'  => 'bail|required',
            'date_end'    => 'bail|required',
            'status'      => 'bail|in:active,inactive',
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
