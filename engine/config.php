<?php

/**
 * 
 * Ni main url nya bisa di rubah ke RS lain wkwokwokwo
 * 
 */
$config['url']           = 'http://10.40.1.8';


/**
 * 
 * length of generate
 * 
 * 
 */
$config['length'] = 20;





/**
 * 
 * ini username dan password API ehos nya kalo password admin dan username admin diganin
 * ini juga kudu di ganti ya
 * 
 */
$config['username']      = 'admin';
$config['password']      = '12caruban';








/**
 *
 * yang ini beisa di rubah bebas yang jelas ini merupakan awal data generate di ambil
 * mulai tanggal berapa, untuk end nya otomatis di ambil hari ini
 *  
 */
$config['star_from']     = '2023-01-01';







/**
 * 
 * INI setingan output folder dari generate nya
 * 
 */
$config['dir_export']    = '../generate';


/**
 * 
 * Apabila ini di rubah sureti id juga kudu di rubah 
 * ini setup default aplikasi sih, pilihan nya cuman ada 2 
 * [bpjs]
 * [covid19]
 * 
 * 
 */
$config['subdir_export'] = 'bpjs';







/**
 * 
 * sureti id adalah berkas penjamin
 * [2] jaminan kesehatan nasional
 * [4] Covid 19
 * yang bagian ini bebas mau di edit, tapi option value nya cuman ada 2
 * 
 */
$config['surety_id']     = 2;









/**
 * 
 * ri untuk rawat jalan
 * rj untuk rawat inap 
 * yang bagian ini bebas mau di edit, tapi option value nya cuman ada 2
 * 
 * 
 */
$config['rj_ri']         = 'ri';








/**
 * 
 * Max Error will be returned
 * INI juga ati ati soalnya bikin lemot kalau kebanyakan
 * 
 * 
 */
$config['max_error'] = 2;









/***
 * 
 * 
 * Config constructor save configurate
 * Jangan sembarangan merubah ini ya !!!
 * 
 */
$config['save_configurate'] = false;
