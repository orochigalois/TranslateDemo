<?php
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __DIR__ . '/ShootingGame-98707e444ec6.json');


require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Translate\TranslateClient;

$data = json_decode(file_get_contents('php://input'), true);

$translate = new TranslateClient();


$target_language_code = 'en';

$result = $translate->translate($data["novel"], [
    'target' => $target_language_code,
]);
echo $result['text'];
die();


?>