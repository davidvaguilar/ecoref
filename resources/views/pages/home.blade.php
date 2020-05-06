@extends('layout')

@section('content')
<?php
/*
Dentro del php.ini tenemos las siguientes directivas junto con sus valores iniciales:

display_errors = On
register_globals = Off
post_max_size = 8M
*/

echo 'display_errors = ' . ini_get('display_errors') . "<br>";
echo 'register_globals = ' . ini_get('register_globals') . "<br>";
echo 'post_max_size = ' . ini_get('post_max_size') . "<br>";
echo 'post_max_size+1 = ' . ((int)ini_get('post_max_size')+1) . "<br>";
echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size')). "<br>";
echo 'upload_max_filesize = ' . ini_get('upload_max_filesize');

function return_bytes($val) {
    $val = (int)trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // El modificador 'G' está disponble desde PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}

?>
	<section class="container">
	


    </section>
    
@stop