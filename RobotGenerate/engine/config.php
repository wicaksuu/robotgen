<?php
$config['url']           = 'http://rsud-caruban.madiunkab.go.id';
$config['username']      = 'admin';
$config['password']      = '12caruban';
$config['star_from']     = '2023-01-01';
$config['dir_export']    = 'generate';
$config['subdir_export'] = 'bpjs';

/**
 * 
 * sureti id adalah berkas penjamin
 * [2] jaminan kesehatan nasional
 * [4] Covid 19
 * 
 */
$config['surety_id']     = 2;




/**
 * 
 * ri untuk rawat jalan
 * rj untuk rawat inap 
 * 
 */

$config['rj_ri']         = 'ri';



/**
 * 
 * Max Error will be returned
 * 
 */

$config['max_error'] = 2;
