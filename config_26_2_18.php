<?php

date_default_timezone_set("Greenwich");
$now = time();
$timestamp = strtotime('2018-02-28 23:59:59');
$timestamp2 = strtotime('2018-03-31 23:59:59');
$url = 'http://104.193.36.85:9006/investmentcoin/api/systeminfo/getallminingresult';
//$server_url_ajax=$url;
$server_url_ajax = 'http://www.ringbit.org/api.php/';
?>