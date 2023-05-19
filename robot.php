<?php
require "engine/autoload.php";
$login_status = login();

if ($login_status == false) {
    console_log('System failed please check your username and password', 'danger');
    die;
}

$seps = get_data($config['star_from'], null, $config['rj_ri'], $config['surety_id']);
$processes = [];

foreach ($seps as $sep) {
    $range = ($config['rj_ri'] == 'rj') ? range(1, 8) : range(1, 9);
    foreach ($range as $num) {
        $pid = pcntl_fork();

        if ($pid == -1) {
            die("Could not fork");
        } elseif ($pid == 0) {
            generateProcess($num, $sep, $config['rj_ri'], $config['surety_id']);
            exit();
        } else {
            $processes[] = $pid;
        }
    }
}

foreach ($processes as $pid) {
    pcntl_waitpid($pid, $status);
}

do {
    $total_error = errror_audit();
} while ($total_error != 0);

if ($config['save_configurate']) {
    $num = 'save_configurate';
    foreach ($seps as $sep) {
        $retry = true;
        while ($retry) {
            $str_stat = generateProcess($num, $sep, $config['rj_ri'], $config['surety_id']);
            if ($str_stat) {
                console_log("Data patient success saved $sep", 'success');
                $retry = false;
            } else {
                console_log("Data patient can't be saved $sep", 'danger');
            }
        }
    }
}


$executionTime = microtime(true) - $start;
$formattedTime = gmdate("H:i:s", $executionTime);

$file = fopen("engine/temp/time.txt", "w");
fwrite($file, $executionTime);
fclose($file);


console_log("ALL DATA SUCCESSFULLY GENERATE", 'success');
console_log("=======================================================", 'success');
console_log("\t\tProcessing Done in: $formattedTime", 'success');
console_log("=======================================================", 'success');