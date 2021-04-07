<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Functions
{
    // 01. Function 01
    public static function merge_Multidi_Array_01($arrSource, $mergeElement) 
    {
        $result = array_reduce($arrSource, function($c, $x) use ($mergeElement){
            $c[$x[$mergeElement]] = isset($c[$x[$mergeElement]])
                ?array_combine(
                    $z=array_keys($c[$x[$mergeElement]]), 
                    array_map(function($y) use ($x, $c, $mergeElement)
                    {
                        return in_array($x[$y], (array)$c[$x[$mergeElement]][$y])
                            ?$c[$x[$mergeElement]][$y]
                            :array_merge((array)$c[$x[$mergeElement]][$y], [$x[$y]]);
                    }, $z)
                )
                :$x;
            return $c;
        }, []);

        return $result;

    }

    // 01. Function 02
    // public static function merge_Multidi_Array_02($arrSource_1, $arrSource_2) 
    // {
    //     foreach ($arrSource_1 as $value) {
    //         $idValue = $value['id'];

    //         if (array_key_exists("$idValue", $arrSource_2)) {
    //             $arrSource_1[$idValue]['detail'] = $arrSource_2[$idValue];
    //         }
    //     }

    //     return $arrSource_1;

    // }

    public static function merge_Multidi_Array_02($arrSource_1, $arrSource_2, $mergeElement='id') 
    {
        foreach ($arrSource_1 as $key => $value) {
            $idValue = $value[$mergeElement];

            if (array_key_exists("$idValue", $arrSource_2)) {
                $arrSource_1[$key]['detail'] = $arrSource_2[$idValue];
            }
        }

        return $arrSource_1;

    }


    // 01. Function 03
    public static function merge_Multidi_Array_03($arrSource, $arrMergeElement) 
    {
        $result = [];
        foreach ($arrSource as $key => $value){
            $result[] = array_merge((array)$arrMergeElement[$key], (array)$value);
        }

        return $result;
    }

    // 01. Function 04
    public static function merge_Multidi_Array_04($arrSource, $max, $idAddEdit) 
    {
        $i = 1;
        foreach ($arrSource as $key => $value) {

            $arrSource[$key]['product_id'] = $idAddEdit;
            if(array_key_exists('attribute_id', $value)) {
                unset($arrSource[$key]['0']);
            }else{
                $arrSource[$key]['attribute_id'] = $max + $i;
                $arrSource[$key]['attribute_name'] = $value['0'];
                unset($arrSource[$key]['0']);
                $i++;
            }

        }

        return $arrSource;
    }

    // 01. Function 05
    public static function merge_05($arrSource, $mergeElement='order_code') 
    {
        $result = [];

        foreach ($arrSource as $values) {
           // Define your key
           $key = $values[$mergeElement];
           // Assign to the new array using all of the actual values
           $result[$key][] = $values;
        }
       
        // Get all values inside the array, but without orderId in the keys:
        $result = array_values($result);

        return $result;
    }

    
    // 02. Function 01
    public static function split_Multidi_Array_01($arrSource, $mergeElement) 
    {
        $arr = array_column($arrSource, $mergeElement);
        $arrCount = array_count_values($arr);
        $result = null;
        if (!empty($arrCount)) {
            foreach ($arrCount as $key => $value) {
                $result[] = $key;
            }
    
        }
        return $result;

    }

    // 02. Function 02
    public static function split_Multidi_Array_02($arrSource, $splitElement, $level) 
    {
        // foreach ($arrSource as $key => $value) {
        //     $arrAttValue = $value[$splitElement];
        //     if(is_array($arrAttValue)){
        //         $arrSource[$key] = $arrAttValue;
        //     }else{
        //         $arrSource[$key] = $arrAttValue;
        //     }
        // }
        switch ($level) {
            case '1':
                foreach ($arrSource as $key => $value) {
                    if (!empty($value)) $arrSource[$key] = $value[0];
                }
                break;
            
            case '2':
                foreach ($arrSource as $key => $value) {
                    foreach ($value as $keyChild => $valueChild) {
                        if (!empty($value)) $arrSource[$key][$keyChild] = $valueChild[$splitElement];
                    }
                }
                break;
            }
        return $arrSource;
    }

    // 03. Function 01
    public static function compare_Multidi_Array_01($arrSource_1, $arrSource_2, $elementCompare,$typeCompare='equal')
    {
        foreach($arrSource_1 as $aV){
            $aTmp1[] = $aV[$elementCompare];
        }
        
        foreach($arrSource_2 as $aV){
            $aTmp2[] = $aV[$elementCompare];
        }

        if ($typeCompare == 'equal') {
            $result = array_intersect($aTmp1,$aTmp2);
        } elseif($typeCompare == 'different') {
            $result = array_diff($aTmp2,$aTmp1);
        }
        
        return $result;
    } 

    // 03. Function 01 implode_Multidi_Array_01
    public static function implode_01($arrSource = null, $typeImplode = 'attribute_value', $string = ',', $type = 'keep')
    {
        foreach ($arrSource as $key => $value) {
            $arrAttValue = $value[$typeImplode];
            if(is_array($arrAttValue)){
                $strInputValue[$key]               = implode($string, $arrAttValue);
                if ($type == 'keep') {
                    $arrSource [$key]["$typeImplode" . '_string'] = $strInputValue[$key];
                } else {
                    $arrSource [$key][$typeImplode] = $strInputValue[$key];
                }
            }
        }
        return $arrSource;
    }

    // 04. Function 01
    public static function explode_Multidi_Array_01($arrSource=null)
    {
        foreach ($arrSource as $key => $value) {
            if(!empty($value) && $value !== '') $arrSource[$key] = explode(',', $value);
        }
        return $arrSource;
    }
    // 05. Function 01   // '0' => '    '  =>   '0' => ''
    public static function remove_WhiteSpace_Multidi_Array_01($arrSource=null)
    {
        $result = preg_grep('/^\s*\z/', $arrSource, PREG_GREP_INVERT);
        return $result;
    }

    // 06. Function 01 Find Value in Multidemision Array
    // $b = array(array("Mac", "NT"), array("Irix", "Linux"));
    // echo in_array_r("Irix", $b) ? 'found' : 'not found';
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $key => $item) {
            // if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                // return true;
            // }
        }
    
        // return false;
    }            

    // 07. Function 01 Fix Array
    public static function fixArray_01($arrSource=null, $element)
    {
        foreach ($arrSource as $key => $value) {
            foreach ($value as $index => $val) {
                $arrSource[$key][$index] = $val[$element];
            }
        }
        return $arrSource;
    }

    // $params = array_map("unserialize", array_unique(array_map("serialize", $params)));

    // $params === Array
    // (
    //     [0] => Array
    //         (
    //             [product_id] => 28
    //         )
    
    //     [1] => Array
    //         (
    //             [product_id] => 29
    //         )
    
    //     [2] => Array
    //         (
    //             [product_id] => 28
    //         )
    
    //     [3] => Array
    //         (
    //             [product_id] => 29
    //         )
    // )

    // $params === Array
    // (
    //     [0] => Array
    //         (
    //             [product_id] => 28
    //         )

    //     [1] => Array
    //         (
    //             [product_id] => 29
    //         )
    // )
}