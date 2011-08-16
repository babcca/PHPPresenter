<?php

$xmlurl = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
$handle = fopen($xmlurl, "r");

if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        echo $buffer;
    }
    fclose($handle);
}
?>