<?php

$data = null;
include_once ("../../core/init.php");

if(!isset($data['nums'])) {
    imprimeRequest(400, "Valores para obtenção da moda 'nums' não informados!");
}

$ret = array();
if(!is_array($data['nums'])) {
    $data['nums'] = array($data['nums']);
}
foreach ($data['nums'] AS $val) {
    if(filter_var($val, FILTER_VALIDATE_FLOAT) === false) {
        imprimeRequest(400, "Valor não númerico encontrado dentre os parâmetros 'nums' para a obtenção da moda!");
    }
}

$countVals = array_count_values($data['nums']);
$maxCount = max(array_values($countVals));
foreach ($countVals AS $val => $count) {
    if($count == $maxCount) {
        $ret[] = $val;
    }
}

imprimeRequest(200, null, $ret);