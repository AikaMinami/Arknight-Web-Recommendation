<?php
$conn = mysqli_connect('localhost','root','','record_data');
if (!$conn)
{
	die('Could not connect:'.mysql_error());
}
?>