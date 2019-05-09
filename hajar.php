<?php
include("konfig.php");
function http_request($url, $waktu, $buntut){
   // create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PORT, $buntut);
curl_setopt($ch, CURLOPT_TIMEOUT, $waktu);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//enable headers
curl_setopt($ch, CURLOPT_HEADER, 1);
//get only headers
curl_setopt($ch, CURLOPT_NOBODY, 1);
// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);
    // mengembalikan hasil curl
    return $output;
}
for ($i= $awal; $i <= $akhir; $i++)
{
   $host = $ip.$i;
   $sikat = http_request($host, $timeout, $port);
   echo "".$host."\n".$sikat.""."\n";
   $berkas =fopen("hasil.txt","a");
   fputs($berkas, $host . "\n");
   fputs($berkas, $sikat . "\n");
   fclose($berkas);
}
?>
