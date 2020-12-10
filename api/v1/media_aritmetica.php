<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['nums'])) {
    imprimeRequest(400, "Valores para obtenção da média aritmética 'nums' não informados!");
}

$ret = 0;
if(!is_array($data['nums'])) {
    $data['nums'] = array($data['nums']);
}
foreach ($data['nums'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros 'nums' para a obtenção da média aritmética!");
    }
    $ret += $val;
}
$ret = $ret / count($data['nums']);

imprimeRequest(200, null, $ret);