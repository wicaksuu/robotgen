<?php
date_default_timezone_set('Asia/Jakarta');
require "vendor/autoload.php";
require "config.php";
require "fuction/main.php";
require "fuction/curl.php";
require "fuction/login.php";
require "fuction/get_data.php";

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
