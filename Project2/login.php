<?php
//start session
include("includes/session.php");

//connect db
include("includes/openDbConn.php");

//get userID and pass
$UserID = $_POST["UserID"];
$Password = md5($_POST["Passwd"]);

//form query
$sql = "SELECT * FROM Project2Users WHERE UserID = '".$UserID."' AND Password = '".$Password."'";

//call query
$result = mysql_query($sql);

//null check result
if(empty($result))
	$num_records = 0;
else
	$num_records = mysql_num_rows($result);

//close db
include("includes/closeDbConn.php");

//if there's a record, then login is successful
if($num_records == 1){
	$_SESSION["errorMessage"] = "";
	$_SESSION["login"] = $UserID;
	$_SESSION['currentUser'] = $UserID;

	//clean up
	CleanUp();
	header("Location:index.php");
	exit;
}
else{
	//clean up
	CleanUp();

	$_SESSION["errorMessage"] = "Either your login or password were incorrect";
	header("Location:index.php");
	exit;
}

//cleanup function
function CleanUp(){
	$UserID = "";
	$Password = "";
	$sql = "";
	$result = "";
	$num_records = "";
}
?>
