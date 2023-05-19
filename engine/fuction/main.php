<?php

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function console_log($message, $level = null)
{
    $time = date("H:i:s", time());
    switch ($level) {
        case 'danger':
            echo "\033[0;31m [ $time ] $message\033[0m\n";
            file_put_contents("engine/temp/log/error.log", "[ $time ] $message\n", FILE_APPEND);
            die;
            break;
        case 'warning':
            echo "\033[0;33m [ $time ] $message\033[0m\n";
            file_put_contents("engine/temp/log/warning.log", "[ $time ] $message\n", FILE_APPEND);
            break;
        case 'success':
            echo "\033[0;32m [ $time ] $message\033[0m\n";
            file_put_contents("engine/temp/log/success.log", "[ $time ] $message\n", FILE_APPEND);
            break;

        default:
            echo "\033[0;94m [ $time ] $message\033[0m\n";
            file_put_contents("engine/temp/log/info.log", "[ $time ] $message\n", FILE_APPEND);
            break;

    }
    return;
}

function generateProcess($num, $sep, $rj_ri, $surety_id)
{
    generate($num, $sep, $rj_ri, $surety_id);
}

function get_logaritma($rj_ri, $number, $set, $surety_id)
{
    global $config;
    $sep = $set['sep'];
    if ($rj_ri == 'rj') {
        switch ($number) {
            case 1:
                $file = "File Tagihan $sep";
                $paper = 'P';
                $data = "px_lap=$sep-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 2:
                $file = "File Lab PK $sep";
                $paper = 'P';
                $data = "px_lap=$sep-2_3_4_5_6_7&pertamakali=$number&total_data=7&total_progres=1&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 3:
                $file = "File Lab PA $sep";
                $paper = 'P';
                $data = "px_lap=$sep-2_3_4_5_6_7&pertamakali=$number&total_data=7&total_progres=1&jenis_layanan=$rj_ri&surety_id=$surety_id&pa=wicak&dir=" . $config['subdir_export'];
                break;
            case 4:
                $file = "File Radiologi $sep";
                $paper = 'P';
                $data = "px_lap=$sep-3_4_5_6_7&pertamakali=$number&total_data=7&total_progres=2&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 5:
                $file = "File Resum Medis $sep";
                $paper = 'P';
                $data = "px_lap=$sep-4_5_6_7&pertamakali=$number&total_data=7&total_progres=3&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 6:
                $file = "File Kombinasi $sep";
                $paper = 'L';
                $data = "px_lap=$sep-5_6_7&pertamakali=$number&total_data=7&total_progres=4&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 7:
                $file = "File Resep $sep";
                $paper = 'P';
                $data = "px_lap=$sep-6_7&pertamakali=$number&total_data=7&total_progres=5&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 8:
                $file = "File Laporan Operasi $sep";
                $paper = 'P';
                $data = "px_lap=$sep-7&pertamakali=$number&total_data=7&total_progres=6&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case "save_configurate":
                $data = "px_lap=$sep-7&pertamakali=$number&total_data=7&total_progres=6&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'] . "&done=wicaksu";
                break;
        }
    } else {
        switch ($number) {
            case 1:
                $file = "File Tagihan $sep";
                $paper = 'P';
                $data = "px_lap=$sep-1_2_3_4_5_6_7_8&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 2:
                $file = "File Lab PK $sep";
                $paper = 'P';
                $data = "px_lap=$sep-2_3_4_5_6_7_8&pertamakali=$number&total_data=8&total_progres=1&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 3:
                $file = "File Lab PA $sep";
                $paper = 'P';
                $data = "px_lap=$sep-2_3_4_5_6_7_8&pertamakali=$number&total_data=8&total_progres=1&jenis_layanan=$rj_ri&surety_id=$surety_id&pa=wicak&dir=" . $config['subdir_export'];
                break;
            case 4:
                $file = "File Radiologi $sep";
                $paper = 'P';
                $data = "px_lap=$sep-3_4_5_6_7_8&pertamakali=$number&total_data=8&total_progres=2&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 5:
                $file = "File Resum Medis $sep";
                $paper = 'P';
                $data = "px_lap=$sep-4_5_6_7_8&pertamakali=$number&total_data=8&total_progres=3&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 6:
                $file = "File Kombinasi $sep";
                $paper = 'L';
                $data = "px_lap=$sep-5_6_7_8&pertamakali=$number&total_data=8&total_progres=4&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 7:
                $file = "File Resep $sep";
                $paper = 'P';
                $data = "px_lap=$sep-6_7_8&pertamakali=$number&total_data=8&total_progres=5&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 8:
                $file = "File Laporan Operasi $sep";
                $paper = 'P';
                $data = "px_lap=$sep-7_8&pertamakali=$number&total_data=8&total_progres=6&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case 9:
                $file = "File Resume Medis Inap $sep";
                $paper = 'P';
                $data = "px_lap=$sep-8&pertamakali=$number&total_data=8&total_progres=7&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'];
                break;
            case "save_configurate":
                $data = "px_lap=$sep-8&pertamakali=$number&total_data=8&total_progres=7&jenis_layanan=$rj_ri&surety_id=$surety_id&dir=" . $config['subdir_export'] . "&done=wicaksu";
                break;
        }
    }
    return ["data" => $data, "file_name" => $file, "paper" => $paper, 'sep' => $sep, 'dir' => $set['dir'], 'rj_ri' => $rj_ri, 'surety_id' => $surety_id, 'number' => $number];
}


function cek_error()
{
    $folderPath = 'engine/temp/error';
    $jsonFiles = glob($folderPath . '/*.json');
    $data = array();
    foreach ($jsonFiles as $file) {
        $jsonContent = file_get_contents($file);
        $data[$file] = json_decode($jsonContent, true);
    }

    foreach ($data as $key => $error) {
        if (file_exists($error['data']['dir'] . "/" . $error['data']['file_name'] . ".pdf")) {
            unlink($key);
        }
    }

    $jsonFiles = glob($folderPath . '/*.json');
    $data = array();
    foreach ($jsonFiles as $file) {
        $jsonContent = file_get_contents($file);
        $data[$file] = json_decode($jsonContent, true);
    }
    return $data;
}

function errror_audit()
{

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
    $errors = cek_error();
    $total_error = 0;
    foreach ($errors as $value) {
        $total_error++;
    }
    console_log('Total data error generate ' . $total_error);
    return $total_error;
}

function generateRandomCode($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charactersLength - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}