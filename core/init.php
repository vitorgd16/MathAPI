<?php

error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

defined("ATTR_CODES") OR define("ATTR_CODES", array(
    400 => array(
        'bol' => false,
        'message' => "Request mal informada!",
        'reason' => null,
        'data' => null,
    ),
    503 => array(
        'bol' => false,
        'message' => "Operação indisponível!",
        'reason' => null,
        'data' => null,
    ),
    200 => array(
        'bol' => true,
        'message' => "Sucesso ao realizar operação!",
        'reason' => null,
        'data' => null,
    ),
));

function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

function arrIsNumerico($arr) {
    if(empty($arr)) return false;

    reset($arr);
    return filter_var(key($arr), FILTER_VALIDATE_INT) !== false;
}

function imprimeRequest($code, $reason = null, $data = null) {
    $ret = ATTR_CODES[$code];
    $ret['reason'] = $reason;
    $ret['data'] = $data;
    http_response_code($code);
    echo json_encode($ret, true);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    imprimeRequest(400, "Requisição POST obrigatória!");
}

$data = @file_get_contents("php://input");
if(empty($data)) {
    imprimeRequest(400, "RAW POST não informado!");
}
if(!isJson($data)) {
    imprimeRequest(400, "O RAW POST informado não é um JSON válido!");
}

$data = json_decode($data, true);