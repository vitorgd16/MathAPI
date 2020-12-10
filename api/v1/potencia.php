<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['num'])) {
    imprimeRequest(400, "Valor principal 'num' não informado!");
}

if(filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false) {
    imprimeRequest(400, "Não foi informado um valor numérico válido para o valor principal 'num'!");
}

if(!isset($data['pows'])) {
    imprimeRequest(400, "Valores de potência 'pows' não informados!");
}

$ret = $data['num'];
if(!is_array($data['pows'])) {
    $data['pows'] = array($data['pows']);
}
foreach ($data['pows'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros de potência 'pows'!");
    }
    $ret = pow($ret, $val);
}

imprimeRequest(200, null, $ret);