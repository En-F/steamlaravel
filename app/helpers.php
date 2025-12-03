<?php

use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\FuncCall;

//Formateo de  la dinero
if (!function_exists('dinero')){
    function dinero($valor){
        $formatter =  new \NumberFormatter('es_ES',\NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($valor,'EUR');
        //return number_format($valor,2,',','-'). ' €';
    };
}

//Formateo de  la fecha
if (!function_exists('fecha_larga')){
    function fecha_larga(Carbon  $valor){
        return $valor
        ->locale('es')
        ->timezone('Europe/Madrid')
        ->translatedFormat('d \d\e F \d\e Y ');// H:i
    }
}
