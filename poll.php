<?php
//Config
$sensor_name = "sensor-name-here";

$poll = file_get_contents( "/sys/bus/w1/devices/$sensor_name/w1_slave" );
preg_match( "/.*?t=(.*)/i", $poll, $m );
$temp = $m[1];
$c = $temp * .001;
$f = ( $c * ( 9 / 5 ) ) + 32;

echo "It is $c c, $f f\n";

$out = array();
$out['c'] = $c;
$out['f'] = $f;
$o = json_encode( $out );
file_put_contents( "/var/www/html/temp.json", $o );
?>
