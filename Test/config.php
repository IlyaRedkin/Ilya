<?php
// $dblocation = "localhost";
// $dbname = "comments";
// $dbuser = "root";
// $dbpasswd = "";
// $dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
// mysql_select_db($dbname);
// if(!$bdcnx){
// 	echo("<p>Server is offline</p>");
// 	exit();
// }
// if(!@mysql_select_db($dbname, $dbcnx)){
// 	echo("<p>Server is offline</p>");
// 	exit();
// }
mysql_connect("localhost","root","");
mysql_select_db("comments");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
?>