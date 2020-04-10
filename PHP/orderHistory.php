<?php
$starttime = '10:20';
    $stoptime = '12:59';
    $diff = (strtotime($stoptime) - strtotime($starttime));
    $total = $diff/60;
    echo sprintf("%02dh %02dm", floor($total/60), $total%60);
