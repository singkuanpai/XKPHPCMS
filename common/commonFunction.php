<?php

Function xink8ErrorShow($errCode){
$ErWindow = "<Script language=javascript>window.alert('".$errCode."');history.go(-1);</Script>";
return $ErWindow;
}


function xink8FiltrateStr($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = xink8FiltrateStr($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}

function getPostTimeXink8($dateStr,$timezone='8')
{
$b = 3600 * $timezone;                         // 客户端时差，这里是北京时间
$dateStr = $dateStr + $b;                   // 计算用于显示的时间戳
$dateStr=  date('Y-m-d H:i:s', $dateStr);
return $dateStr;
}


function GetNow ($timezone) { 
$date_time_array = getdate(); 
$hours = $date_time_array["hours"]+$timezone; 
$minutes = $date_time_array["minutes"]; 
$seconds = $date_time_array["seconds"]; 
$month = $date_time_array["mon"]; 
$day = $date_time_array["mday"]; 
$year = $date_time_array["year"]; 

$timestamp = date("Y-m-d H:i:s",mktime($hours ,$minutes, $seconds,$month ,$day, $year)); 
return $timestamp;
} 

?>