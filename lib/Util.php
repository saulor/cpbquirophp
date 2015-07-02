<?php

class Util {

    
    public static function isEmpty($value) {
        if(strlen($value) == 0)
            return true;   
        return false;
    }
      
    /*public static function isNumeric($value) {
        $value = str_replace(',', '.', $value);
        if(!(is_numeric($value)))
            return false;
        return true;
    }
      
    public static function isInteger($value) {
        if(!DataValidator::isNumeric($value))
            return false;
          
        if(preg_match('/[[:punct:]&^-]/', $value) > 0)
            return false;
        return true;
    }*/
}
?>