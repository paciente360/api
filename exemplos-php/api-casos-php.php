<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.paciente360.com.br/integration/casos"); // URL da api
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'client_id:', //id do cliente fornecido pelo Paciente 360
    'client_key:' // Chave de acesso fornecida pelo Paciente 360
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

print  $server_output ;
?>