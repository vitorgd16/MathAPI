<?php

$protocol = 'http://';
if (
    isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' &&
    isset($_SERVER['REMOTE_ADDR'])
) {
    $protocol = 'https://';
}

echo "Bem vindo!<br /><br />";
echo "URL Git: https://github.com/vitorgd16/MathAPI<br />";
echo "URL Heroku: " . $protocol . $_SERVER['HTTP_HOST'] . "<br /><br />";

echo "ATENÇÃO: Todas as requests desse trabalho foram realizadas visando o método POST<br />";
echo "Para realizar o download da Collection no Postman, utilize o END Point /MathAPI.postman_collection.json";