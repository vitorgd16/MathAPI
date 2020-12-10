<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['num'])) {
    imprimeRequest(400, "Valor principal 'num' não informado!");
}

if(filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false) {
    imprimeRequest(400, "Não foi informado um valor numérico válido para o valor principal 'num'!");
}

if(!isset($data['divs'])) {
    imprimeRequest(400, "Valores da divisão 'divs' não informados!");
}

$ret = $data['num'];
if(!is_array($data['divs'])) {
    $data['divs'] = array($data['divs']);
}
foreach ($data['divs'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros de divisão 'divs'!");
    }
    if(empty($val)) {
        imprimeRequest(400, "Valor 0 encontrado dentre os parâmetros de divisão 'divs', é impossível realizar uma divisão por 0!");
    }
    $ret /= $val;
}

imprimeRequest(200, null, $ret);