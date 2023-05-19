<?php
$filename[] = "File_Lab_PA_1307R0020323V001213.json";
$filename[] = "File_Laporan_Operasi_1307R0020423V006414.json";
$filename[] = "File_Resume_Medis_Inap_1307R0020423V006414.json";


foreach ($filename as $value) {
    $dat = explode('_', str_replace('.json', '', $value));
    $dat = $dat[count($dat) - 1];
    print_r($dat);
    echo "\n";
}
