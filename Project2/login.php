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

//log current login attempt
$LoginAttemptDate = date("Y-m-d H:i:s", time());
$REMOTE_ADDR = getRealIpAddr();
$HTTP_Host = $_SERVER['HTTP_HOST'];
$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];

if($num_records == 1){
	$Success = 1;
}
else{
	$Success = 0;
}

$sql = "INSERT INTO Project2Logs(LoginAttemptDate, REMOTE_ADDR, HTTP_HOST, AttemptedUserID, HTTP_USER_AGENT, Success) ";
$sql .= "VALUES('".$LoginAttemptDate."', '".$REMOTE_ADDR."', '".$HTTP_Host."', '".$UserID."', '".$HTTP_USER_AGENT."', '".$Success."')";

$_SESSION["debug"] = $sql;

//call query
$result = mysql_query($sql);

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

//Get client ip address
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
