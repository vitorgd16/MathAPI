<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['num'])) {
    imprimeRequest(400, "Valor principal 'num' não informado!");
}

if(filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false) {
    imprimeRequest(400, "Não foi informado um valor numérico válido para o valor principal 'num'!");
}

if(!isset($data['sums'])) {
    imprimeRequest(400, "Valores da somatória 'sums' não informados!");
}

$ret = $data['num'];
if(!is_array($data['sums'])) {
    $data['sums'] = array($data['sums']);
}
foreach ($data['sums'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros da somatória 'sums'!");
    }
    $ret += $val;
}

imprimeRequest(200, null, $ret);