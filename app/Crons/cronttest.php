<?php
$ctime = date('l jS \of F Y h:i:s A');
$myFile = "cronresults.txt";
$fh2 = fopen($myFile, 'a') or die("can't open file to append");
$stringData = "appended text from cron job ran at $ctime....\n";
fwrite($fh2, $stringData);
fclose($fh2);
?>