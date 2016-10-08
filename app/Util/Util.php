<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 27/08/16
 * Time: 18:28
 */

namespace App\Util;


class Util
{
    public static function strUpper($string)
    {
        setlocale(LC_CTYPE, 'pt_BR');
        if(!empty($string) || $string != ''){
            $string = utf8_decode($string);
            $string = strtoupper($string);
            $string = utf8_encode($string);
        }
        return $string;
    }

    public static function formNull($campo)
    {
        if(empty($campo) || $campo == ''){
            return $campo = NULL;
        }
        return $campo;
    }

    public static function formCpfToDatabase($cpf)
    {
        return str_replace(['.','-'],['',''], $cpf);
    }

    public static function formDataToDatabase($date){
        if(!empty($date)){
            $date = explode('/', $date);
            $date = $date[2] . '-' .$date[1] . '-' . $date[0];
            return $date;
        }
        return NULL;
    }
}