<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['num'])) {
    imprimeRequest(400, "Valor principal 'num' não informado!");
}

if(filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false) {
    imprimeRequest(400, "Não foi informado um valor numérico válido para o valor principal 'num'!");
}

if(!isset($data['subs'])) {
    imprimeRequest(400, "Valores da subtração 'subs' não informados!");
}

$ret = $data['num'];
if(!is_array($data['subs'])) {
    $data['subs'] = array($data['subs']);
}
foreach ($data['subs'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros de subtração 'subs'!");
    }
    $ret -= $val;
}

imprimeRequest(200, null, $ret);