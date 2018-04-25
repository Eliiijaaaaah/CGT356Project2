<!DOCTYPE html>
<?php
include("includes/session.php");
$_SESSION["activeItem"] = "home";

//This file is validating as HTML5
//You need to use an HTML5 validator to check your code
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Project 2</title>
	<meta charset="utf-8" />
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Project 2</h1>
<?php
	if(!isset($_SESSION['currentUser'])){
	 include("includes/login.php");
	}
	else{
		echo('<a href="includes/logout.php">Logout</a>');
	}
 ?>

</body>
</html>
