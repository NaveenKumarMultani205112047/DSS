<?php 


$conn =mysql_connect("localhost","root","")or die(mysql_error());
$database=mysql_select_db("DSS",$conn);
if(!$conn)
{
	echo "Con Failed..";
	die(mysql_error());
}

?>
