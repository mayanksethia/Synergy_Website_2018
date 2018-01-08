<?php

$db_name = "synergy";
$mysql_user = "root";
$mysql_pass = "x5jTegHu63HiLEa0";
$server_name = "localhost";
//$mysql_db='synergy';
//$mysql_host='localhost';

//$mysql_user='ietedb';
//$mysql_pass='ietedb';
//$mysql_db='iete';

//if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass)||!@mysql_select_db($mysql_db)){
//die(mysql_error());
//}



$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if(!$con)
{
	echo"connection error...".mysqli_connect_error();
}
else
{
	echo"<h3> Database connection success...</h3>";

}




?>