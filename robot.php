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

$errors = cek_error();
foreach ($errors as $error) {
    if (file_exists($error['data']['dir'] . "/" . $error['data']['file_name'] . ".pdf")) {
        unlink("engine/temp/error/" . $error['data']['sep'] . ".json");
    }
}

$errors = cek_error();
$processes_erros = [];
foreach ($errors as $error) {
    $pid_errors = pcntl_fork();
    if ($pid_errors == -1) {
        die("Could not fork");
    } elseif ($pid_errors == 0) {
        console_log('Regenerate Error Code ' . $error['data']['file_name']);
        generate($error['data']['number'], $error['data'], $error['data']['rj_ri'], $error['data']['surety_id']);
        exit();
    } else {
        $processes_erros[] = $pid_errors;
    }
}

foreach ($processes_erros as $pid_errors) {
    pcntl_waitpid($pid_errors, $status);
}
