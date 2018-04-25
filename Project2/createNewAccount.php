<?php
//Start session
session_start();

//get form data
$UserID = $_POST["UserID"];
$Password1 = md5($_POST["Passwd"]);
$Password2 = md5($_POST["PasswdConfirm"]);
$PassMatch = false;

//Null check on form
if (empty($_POST["UserID"]) || empty($_POST["Passwd"]) || empty($_POST["PasswdConfirm"]))
{
	$_SESSION["errorMessage"] = "Please complete all of the form fields";
	header("Location:includes/newAccount.php");
	exit;
}

//db connect
include("includes/openDbConn.php");

//if passwords match
if($Password1 == $Password2)
{
	//check if exists
	$sql = "SELECT UserID FROM Project2Users WHERE UserID='".$UserID."'";

	//call query
	$result = mysql_query($sql);

	//null check result
	if (empty($result)){
		$num_records = 0;
	}
	else{
		$num_records = mysql_num_rows($result);
	}

	if ($num_records == 0){
		//form insert
		$sql = "INSERT INTO Project2Users(UserID, Password) ";
		$sql .= "VALUES('".$UserID."', '".$Password1."')";

		//insert user
		$result = mysql_query($sql);

		//message to user
		$_SESSION["errorMessage"] = "User added successfully";

		//set pass match true
		$PassMatch = true;
	}
	else{
		//message to user
		$_SESSION["errorMessage"] = "User already exists in the database";

		//set pass match false
		$PassMatch = false;
	}
}
else{
	//passwords don't match
	$_SESSION["errorMessage"] = "The two passwords you entered do not match";

	//set pass match false
	$PassMatch = false;
}

//close db conn
include("includes/closeDbConn.php");

//cleanup
CleanUp();

//if passMatch true, success
if ($PassMatch){
	//redirect to success
	header("Location:index.php");
	exit;
}
else{
	//redirect to newAccount
	header("Location:includes/newAccount.php");
	exit;
}

function CleanUp(){
	$UserID = "";
	$Password1 = "";
	$Password2 = "";
	$PassMatch = "";
	$sql = "";
	$result = "";
}
?>
