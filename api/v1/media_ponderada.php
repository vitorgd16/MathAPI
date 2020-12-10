<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['vals'])) {
    imprimeRequest(400, "Valores para obtenção da média ponderada 'vals' não informados!");
}

if(!is_array($data['vals'])) {
    imprimeRequest(400, "O formato do parâmetro 'vals' é inválido!");
}

if(!arrIsNumerico($data['vals'])) {
    $data['vals'] = array($data['vals']);
}

$num = 0;
$divisao = 0;
foreach ($data['vals'] AS $val) {
    if(!isset($val['val'])) {
        imprimeRequest(400, "Valor 'val' não especificado encontrado dentre os objetos do parâmetro 'vals' para a obtenção da média ponderada!");
    }
    if(filter_var($val['val'], FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor de 'val' não númerico encontrado dentre os objetos do parâmetro 'vals' para a obtenção da média ponderada!");
    }

    if(!isset($val['peso'])) {
        imprimeRequest(400, "Valor 'peso' não especificado encontrado dentre os objetos do parâmetro 'vals' para a obtenção da média ponderada!");
    }
    if(filter_var($val['peso'], FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor de 'peso' não númerico encontrado dentre os objetos do parâmetro 'vals' para a obtenção da média ponderada!");
    }

    $num += ($val['val'] * $val['peso']);
    $divisao += $val['peso'];
}
if(empty($divisao)) {
    imprimeRequest(400, "Os valores somados dos pesos é igual a 0! Impossível realizar média ponderada!");
}

$ret = $num / $divisao;
unset($num);
unset($divisao);

imprimeRequest(200, null, $ret);