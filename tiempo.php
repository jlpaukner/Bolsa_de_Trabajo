<?php
ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

$time1 = date('H:i:s', time());

$time2 = date('Y-m-d, H:i:s', time());

echo date("g:i a", strtotime($time1));//strtime es para el formato de pm-am

print '<br>';

echo $time2.'<br>';
?>