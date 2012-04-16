<?php
include('./config.php');

$query = sprintf("SELECT `serverid` FROM `phpreg` WHERE `userid` = '%s'",$_POST['From']);
$result = mysql_query($query, $cxn);
if (mysql_num_rows($result) == 0) {
    $splitstring = explode(" ",$_POST['Body'],2);
    if (strtolower($splitstring[0]) == 'register') {
        $c = curl_init($registerurl);
        curl_setopt($c, CURLOPT_POST, True);
        curl_setopt($c, CURLOPT_POSTFIELDS, array("confirmcode" => $splitstring[1]));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, True);
        $data = curl_exec($c);
        curl_close($c);
        if (!preg_match('/[0-9]*/',$data)) {
            $message = $data;
        }
        else {
            $query = sprintf("INSERT INTO `phpreg` (`userid`,`serverid`) VALUES ('%s','%s')",$_POST['From'],$data);
            $result = mysql_query($query,$cxn);
            if ($result) {
                $message = 'You are now registered.';
            } else {
                $message = 'Sorry, we could not register you at this time, please try again later. Error 5';
            }
        }
    }
    else {
        $message = "Sorry, you're not registered for this system.";
        $message .= sprintf("Please visit %s to register.",$registerurl);
    }
}
else {
    $row = mysql_fetch_assoc($result);
    $ch = curl_init($cbfurl);
    curl_setopt($ch, CURLOPT_POST, True);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("message" => $_POST['Body'], "userid" => $row['serverid']));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
    $data = curl_exec($ch);
    curl_close($ch);
    $message = $data;
}

$response = new Services_Twilio_Twiml();
while (strlen($message) > 0) {
    $substr = substr($message,0,160);
    $message = substr($message,160);
    $response->sms($substr);
}
print $response;
?>