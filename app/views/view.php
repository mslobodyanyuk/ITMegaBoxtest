
<?php
/*
* views/view.php - displays the result of the method view of controller
*/
use app\Controllers;
header('Content-Type: text/html; charset=utf8');

$params = $controllerParams;
echo "</br>- I am a view.php",'<br /><h2>Price list: </h2>',"<pre>",print_r($params),"</pre>","<hr>";
?>
	 		


