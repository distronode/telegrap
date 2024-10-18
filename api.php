<?php

include_once 'config.php';
$counter_data = file_get_contents($url);
//echo json_encode($counter_data);
echo $counter_data;
?>