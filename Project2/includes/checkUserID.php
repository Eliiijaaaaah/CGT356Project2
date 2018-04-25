<?php
$mode = $_GET["mode"];

if($mode == "ask"){
	$un = $_GET["username"];

	//connect to db
	include("openDbConn.php");

	//make sure login doesn't exist
	$sql = "SELECT UserID FROM Project2Users WHERE UserID='".$un."'";

	//call query
	$result = mysql_query($sql);

	//null check result
	if (empty($result)){
		$num_records = 0;
	}
	else{
		$num_records = mysql_num_rows($result);
	}

	//close db conn
	include("closeDbConn.php");

	if ($num_records == 0)
		echo("available");
	else
		echo("not available");
}
?>
