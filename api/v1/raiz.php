<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['nums'])) {
    imprimeRequest(400, "Valores para obtenção de raiz quadrada 'nums' não informados!");
}

$ret = array();
if(!is_array($data['nums'])) {
    $data['nums'] = array($data['nums']);
}
foreach ($data['nums'] AS $key => $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros 'nums' para a obtenção das raizes quadradas!");
    }
    $ret[(string) $val] = sqrt($val);
}

imprimeRequest(200, null, $ret);