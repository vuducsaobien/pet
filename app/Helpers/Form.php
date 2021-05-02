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
                    $eleText = $element['text'];
                    $eleName = $element['name'];
    
                    $xhtmlPre = '';
                    foreach ($eleText as $key => $value) {
                        $xhtmlPre .= '
                            <label class="">
                                <div class="icheckbox_flat-green checked" style="position: relative;">
                                    <input name="'.$eleName[$key].'" type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                                '.$eleText[$key].'
                            </label>
                        ';
                    }
    
                    $xhtml = '
                        <div class="form-group row">
                            <label class="col-md-3 col-sm-3  control-label">Checkboxes and radios
                                <br>
                                <small class="text-navy">Normal Bootstrap elements</small>
                            </label>
                            <div class="col-md-9 col-sm-9 ">

                                <div class="checkbox">
                                    <label class="">
                                        <div class="icheckbox_flat-green checked" style="position: relative;">
                                            <input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; 
                                            left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); 
                                            border: 0px; opacity: 0;"></ins>
                                        </div>
                                        Checkeddd
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        Uncheckeddd
                                    </label>

                                    <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        Uncheckeddd
                                    </label>

                                    <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        Uncheckeddd
                                    </label>

                                    <label class="">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    Uncheckeddd
                                </label>

                                <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                Uncheckeddd
                            </label>

                            <label class="">
                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            Uncheckeddd
                        </label>

                        <label class="">
                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        Uncheckeddd
                    </label>

                    <label class="">
                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    Uncheckeddd
                </label>


                                </div>

                            </div>
                        </div>
                    ';

                    // $xhtml = sprintf('
                    // <div class="form-group">
                    //     %s
                    //     <div class="checkbox">
                    //         %s                
                    //     </div>
                    // </div>
                    // ', $element['label'], $xhtmlPre);
                    // break;
        
                    
                }
    
        return $xhtml;
    }
 
}


