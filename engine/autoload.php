<?php
date_default_timezone_set('Asia/Jakarta');
require "vendor/autoload.php";
require "config.php";
require "fuction/main.php";
require "fuction/curl.php";
require "fuction/login.php";
require "fuction/get_data.php";

if (isset($argv[1])) {
    if ($config[1] == 'rj') {
        $config['rj_ri']         = 'rj';
    }
}
$start = microtime(true);

$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0,
    'sslverify' => false,
]);
