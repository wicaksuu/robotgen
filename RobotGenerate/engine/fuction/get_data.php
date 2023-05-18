<?php

function get_data($start_from, $end_from = null, $rj_ri = 'rj', $surety_id = 2)
{
    global $config;
    if ($end_from === null) {
        $end_from = date('Y-m-d', time());
    }
    console_log('Get all data patient information');

    $data = "sEcho=9&iColumns=10&sColumns=%2C%2C%2C%2C%2C%2C%2C%2C%2C&iDisplayStart=0&iDisplayLength=10&mDataProp_0=0&sSearch_0=&bRegex_0=false&bSearchable_0=true&bSortable_0=false&mDataProp_1=1&sSearch_1=&bRegex_1=false&bSearchable_1=true&bSortable_1=false&mDataProp_2=2&sSearch_2=&bRegex_2=false&bSearchable_2=true&bSortable_2=false&mDataProp_3=3&sSearch_3=&bRegex_3=false&bSearchable_3=true&bSortable_3=false&mDataProp_4=4&sSearch_4=&bRegex_4=false&bSearchable_4=true&bSortable_4=false&mDataProp_5=5&sSearch_5=&bRegex_5=false&bSearchable_5=true&bSortable_5=false&mDataProp_6=6&sSearch_6=&bRegex_6=false&bSearchable_6=true&bSortable_6=false&mDataProp_7=7&sSearch_7=&bRegex_7=false&bSearchable_7=true&bSortable_7=false&mDataProp_8=8&sSearch_8=&bRegex_8=false&bSearchable_8=true&bSortable_8=false&mDataProp_9=9&sSearch_9=&bRegex_9=false&bSearchable_9=true&bSortable_9=false&sSearch=&bRegex=false&iSortCol_0=4&sSortDir_0=desc&iSortingCols=1&fil_jenis_waktu=periode&fil_tgl1=$start_from&fil_tgl2=$end_from&fil_jenis_layanan=$rj_ri&fil_tmp_layanan=0&fil_stt=0&fil_file_lap=1%7C%7C2%7C%7C3%7C%7C4%7C%7C5%7C%7C6%7C%7C7%7C%7C&surety_id=$surety_id&jns_tgl=0";
    $url  = $config['url'] . "/pelayanan_medis/generate_report_penjamin/get_data";
    $resp =  curlRequest($url, 'POST', $data, null);

    if ($get_data = json_decode($resp, true)) {
        $seps = [];
        foreach ($get_data['aaData'] as $dumps) {
            $sep = get_string_between($dumps[0], 'value="', '"></center>');
            $tgl = preg_replace('/\//', "/{$rj_ri}/", str_replace('-', '/', get_string_between($dumps[4], "class='label_sep_tgl'>", '</label>')), 1);
            if (strpos($dumps[1], 'label_sudah_keluar') !== false) {
                if ($sep != '') {
                    $patch = $config['dir_export'] . "/" . $config['subdir_export'] . "/" . $tgl . "/" . $sep;
                    $patch = str_replace("/\/", '', $patch);
                    if (!file_exists($patch)) {
                        mkdir($patch, 0777, true);
                    }
                    $seps[] = ["sep" => $sep, "dir" => $patch];
                }
            }
        }
    }
    $total_data = count($seps);
    if ($total_data == 0) {
        console_log('No data for generate', 'danger');
    }
    $total_belum_gen = $get_data['iTotalRecords'];
    $persen = $total_data / $total_belum_gen * 100;
    console_log("Get data successfully total: $total_data/$total_belum_gen [ $persen% ]", 'success');
    return $seps;
}

function generate($number, $sep, $rj_ri = 'rj', $surety_id = 2)
{
    global $config;
    global $mpdf;

    console_log("Generating [$number]: " . $sep['sep']);

    $data  = get_logaritma($rj_ri, $number, $sep, $surety_id);
    $url   = $config['url'] . "/pelayanan_medis/generate_report_penjamin/proses";
    $resp  = curlRequest($url, 'POST', $data['data'], null, 1, $data);

    if ($resp != '') {
        $mpdf->AddPage($data['paper']);
        $mpdf->WriteHTML($resp);
        $mpdf->Output($sep['dir'] . "/" . $data['file_name'] . '.pdf', 'f');
        console_log("Generating [" . $data['file_name'] . "]: " . $sep['sep'] . " successfully", "success");
        return true;
    } else {
        console_log("Generating [" . $data['file_name'] . "]: " . $sep['sep'] . " data not found", "warning");
        return false;
    }
}
