<?php
namespace App;

class Utils {
    static function formatReal($value)
    {
        $aux = 0;
        $value = ($value === '') ? 0 : $value;
        if ($value ) {
            if (strpos($value, ',')){
                $aux = str_replace(".", "", $value);
                $aux = str_replace(",", ".", $aux);
            }else{
                $aux = $value;
            }
            $aux = str_replace("%", "", $aux);
            $value = str_replace("-", "", $aux);
        }

        return number_format($value,2,'.','');
    }
}
