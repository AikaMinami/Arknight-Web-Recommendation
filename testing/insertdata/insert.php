<?php
//Insert

include 'conn.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];

$newReport = "INSERT INTO record(fname,lname) VALUES ('$fname','$lname')";


if (mysqli_query($conn,$newReport))

	{
		echo "<script>alert('Name: $fname $lname successfully sent.')
				location.href = 'index.php?attempt=success';
				</script>";
	}
	else
	{
		echo "Error adding user in database<br />";
	}
?>	



