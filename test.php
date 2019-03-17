<?php
include "../template.php";

$path = "../../config/config.ini";
$config = parse_ini_file($path);
$min = $config['min'];
$max = $config['max'];

date_default_timezone_set("Asia/Jakarta");
$time = date("H:i");

if($time > $min and $time < $max){
    $vote = "System On";
} else {
    $vote = "System Off";
}

if(isset($_POST['update'])){
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    
    $regards = "########## WonxJowo-Team ########## \n";
    $txt1 = "min = ".$start."\n";
    $txt2 = "max = ".$stop;
    
    if($handle = fopen($path, 'w')){
        fwrite($handle, $regards);
        fwrite($handle, $txt1);
        fwrite($handle, $txt2);
        fclose($handle);
    } else {
        $vote = "Gagal mengubah config";
    }
}