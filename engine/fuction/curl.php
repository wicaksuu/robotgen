<?php
function curlRequest($url, $method = 'GET', $data = null, $cookies = null, $attempt = 1, $sep = null)
{
    global $config;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.5615.50 Safari/537.36",
        "Connection: close",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    }

    if (!empty($cookies)) {
        curl_setopt($curl, CURLOPT_COOKIE, $cookies);
    }

    $cookieFile = 'engine/temp/cookies.txt';
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookieFile);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookieFile);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($httpCode !== 200 && $attempt < $config['max_error'] && $sep != null) {
        $file = fopen("engine/temp/error/" . str_replace(' ', '_', $sep['file_name']) . ".json", "w");
        fwrite($file, json_encode([
            "url" => $url,
            "method" => $method,
            "http_code" => $httpCode,
            "data" => $sep
        ]));
        fclose($file);
        console_log('Failed to get data ' . $attempt . ' => ' . $httpCode . " [" . $sep['sep'] . " : " . $sep['file_name'] . "]", 'warning');
        return curlRequest($url, $method, $data, $cookies, $attempt + 1);
    }

    return $response;
}
