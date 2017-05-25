<?php

require_once(dirname(__FILE__) . '/config.php');

if(!defined('FINGER_PORT')) define('FINGER_PORT', 79);
if(!defined('FINGER_TIMEOUT')) define('FINGER_TIMEOUT', 5);

$err = '';
$sock = fsockopen(FINGER_HOST, FINGER_PORT, $errno, $errstr, $timeout = FINGER_TIMEOUT);
if(is_resource($sock))
{
	fwrite($sock, FINGER_USER . "\n");
	$buf = stream_get_contents($sock);
	fclose($sock);
}
else
{
	$buf = $errstr;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Where am I?</title>
	</head>
	<body>
		<pre><?php

echo htmlspecialchars($buf, ENT_QUOTES, 'UTF-8');

?></pre>
	</body>
</html>
