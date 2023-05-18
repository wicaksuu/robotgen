<?php

function login()
{
    $maxAttempts = 5;
    $attempts = 0;
    global $config;
    while ($attempts < $maxAttempts) {
        console_log('Cek system');
        $cek_login = cek_login();
        if (isset($cek_login['id_cat_rad'])) {
            console_log('System ok', 'success');
            return true;
        } else {
            console_log('System not valid', 'warning');
            $url = $config['url'] . "/login/log_on";
            $data = "username=" . $config['username'] . "&password=" . $config['password'];
            curlRequest($url, 'POST', $data, null);
        }

        $attempts++;
    }

    return false;
}

function cek_login()
{
    global $config;
    $resp = array();
    $url = $config['url'] . "/pelayanan_medis/c_pelRajal/get_setting";
    $data = "";
    $resp =  curlRequest($url, 'POST', $data, null);

    if ($resp = json_decode($resp, true)) {
        return $resp;
    } else {
        return $resp;
    }
}
