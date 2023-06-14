<?php
date_default_timezone_set('Asia/Jakarta');

require "vendor/autoload.php";
require "config.php";

if (file_exists("engine/temp/last.txt")) {
    $targetDate = file_get_contents("engine/temp/last.txt");
    $today      = date('Y-m-d');
    if ($targetDate == $today) {
        $runner = $targetDate;
    } else {
        $runner = date('Y-m-d', strtotime($targetDate . ' + 1 day'));
    }
} else {
    $runner = $config['star_from'];
}


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
    'sslverify' => true,
]);
