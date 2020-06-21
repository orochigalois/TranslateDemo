<?php
define('USER_AGENT', 'Mozilla/4.0');
function curl_request($postfields)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT, USER_AGENT);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, 'https://api.deepl.com/v2/translate');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    $result =  curl_exec($ch);
    curl_close($ch);
    return $result;
    
}


$data = json_decode(file_get_contents('php://input'), true);

$postfields = array(
    'auth_key' => 'df7436ca-a82f-6240-bd75-c2e50ca9308d',
    'text' => $data["novel"],
    'target_lang' => 'EN'
);

$result = curl_request($postfields);
$jsonobj = json_decode($result);

echo $jsonobj->translations[0]->text;

die();
