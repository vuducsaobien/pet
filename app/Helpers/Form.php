<?php 
namespace App\Helpers;
use Config;

class Form {
    public static function show ($elements) {
        $xhtml = null;
        foreach ($elements as $element) {
            $xhtml .= self::formGroup($element);
        }
        return $xhtml;
    }

    public static function formGroup ($element, $params = null) {
        $type = isset($element['type']) ? $element['type'] : "input";
        $xhtml = null;

        switch ($type) {
            case 'input':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'random':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-5 col-sm-5 col-xs-11">
                            %s
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1">
                            <button type="button" class="btn btn-primary" id="random-code" title="Tạo mới">
                                <span class="fa fa-rotate-left"></span>
                            </button>
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'full':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'full-12':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'thumb':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>', $element['label'], $element['element'], $element['thumb']
                );
                break;
            case 'avatar':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>', $element['label'], $element['element'], $element['avatar']
                );
                break;
            case 'btn-submit':
                $xhtml .= sprintf(
                    '<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            %s
                        </div>
                    </div>', $element['element']
                );
                break;
            case 'btn-submit-edit':
                $xhtml .= sprintf(
                    '<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            %s
                        </div>
                    </div>', $element['element']
                );
                break;

            case 'multi-checkbox':
                $eleText         = $element['text'];
                $eleName         = $element['name'];
                $eleArrActionIds = @$element['arr_action_id'];
                $checkbox        = [];


                $xhtml           = '
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-3  control-label">Các Action của Controller
                        </label>

                        <div class="col-md-6 col-sm-6">
                            <div class="checkbox">
                ';

                // Checkbox
                foreach ($eleName as $key => $value) 
                {
                    if ( $eleArrActionIds != null ) 
                    {
    
                        foreach ($eleArrActionIds as $keyC => $valueC) {
                            if ( $value == $valueC ) {
                                $checkbox[$key] = 'checked = "checked"';
                                break;
                            }else{
                                $checkbox[$key] = null;
                            }
                        }
                        
                    }else{
                        $checkbox[$key] = null;
                    }

                }

                foreach ($eleText as $key => $value) 
                {
                    $xhtml .= '
                        <label class="">
                            <div class="icheckbox_flat-green checked" style="position: relative;">
                                <input name="multi_checkbox['.$eleName[$key].']" '.$checkbox[$key].' type="checkbox" class="flat" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; 
                                    left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); 
                                    border: 0px; opacity: 0;">
                                </ins>
                            </div>
                            '.$eleText[$key].' '.str_repeat('&nbsp;', 75).'
                        </label>
                    ';
                }

                $xhtml .= '
                            </div>
                        </div>
                    </div>
                ';      
            break;

            case 'multi-checkbox-2':
                $xhtml             = '';
                $flag_checkbox     = false;
                $eleContID         = $element['controller_id'];
                $eleContDev        = $element['controller_name_dev'];
                $eleContFrie       = $element['controller_name_friendly'];
                $eleArrPerIDs      = $element['itemsPerIDs'];
                $eleArrPerActName  = $element['itemsPerActName'];
                $eleArrPerActRoute = $element['itemsPerActRoute'];
                $eleArrPerIdsCheck = @$element['itemsPerIdsCheck'];

                // Checkbox
                if ( !empty($eleArrPerIdsCheck) ) 
                {
                    $flag_checkbox = true;

                    foreach ($eleArrPerIDs as $key => $value) 
                    {
                        foreach ($value as $keyB => $valueB) 
                        {
                            foreach ($eleArrPerIdsCheck as $keyC => $valueC) 
                            {

                                if ( $valueC == $valueB ) {
                                    $checkbox[$key][$keyB] = 'checked = "checked"';

                                } else {

                                    if ( empty($checkbox[$key][$keyB]) ) {
                                        $checkbox[$key][$keyB] = null;
                                    }
                                }
                            }

                        }

                    }
                    
                }

                // Html Checkbox
                foreach ($eleContDev as $key => $value) 
                {
                    $xhtml .= '
                        <div class="form-group row">
                            <label class="col-md-3 col-sm-3  control-label">
                                Tên các Quyền của Controller: '.$eleContFrie[$key].' ('.$eleContDev[$key].')
                            </label>

                            <div class="col-md-6 col-sm-6">
                                <div class="checkbox">
                    ';

                    foreach ($eleArrPerActName[$key] as $keyC => $valueC) 
                    {
                        $checked = null;
                        if ( $flag_checkbox ) $checked = $checkbox[$key][$keyC];
                        
                        $xhtml .= '
                            <label class="">
                                <div class="icheckbox_flat-green checked" style="position: relative;">
                                    <input name="multi_checkbox['.$eleArrPerIDs[$key][$keyC].']" '.$checked.'  type="checkbox" class="flat" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; 
                                        left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); 
                                        border: 0px; opacity: 0;">
                                    </ins>
                                </div>
                                '.$valueC. ' ( ' .$eleArrPerActRoute[$key][$keyC].' ) '.str_repeat('&nbsp;', 15).'
                            </label>
                        ';
                    }

                    $xhtml .= '
                                </div>
                            </div>
                        </div>
                    ';
                }
            break;
        }
    
        return $xhtml;
    }
 
}
