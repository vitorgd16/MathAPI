<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['num'])) {
    imprimeRequest(400, "Valor principal 'num' não informado!");
}

if(filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false) {
    imprimeRequest(400, "Não foi informado um valor numérico válido para o valor principal 'num'!");
}

if(!isset($data['mults'])) {
    imprimeRequest(400, "Valores de multiplicação 'mults' não informados!");
}

$ret = $data['num'];
if(!is_array($data['mults'])) {
    $data['mults'] = array($data['mults']);
}
foreach ($data['mults'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros de multiplicação 'mults'!");
    }
    $ret *= $val;
}

imprimeRequest(200, null, $ret);