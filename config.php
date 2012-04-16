<?php
$server = "<MySQL Server>";
$username = "<MySQL Username>";
$password = "<MySQL Password>";
$db = "<MySQL Database>";
$cxn = mysql_connect($server,$username,$password);
mysql_select_db($db,$cxn);

$registerurl = "<Registration URL>";
$cbfurl = "<Responder URL>";

include('./Services/Twilio.php');
?>