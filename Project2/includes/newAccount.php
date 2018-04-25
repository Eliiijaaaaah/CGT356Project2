<?php
include("session.php");

//This file is validating as HTML5
//You need to use an HTML5 validator to check your code
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Project 2 - Create New Account</title>
	<meta charset="utf-8" />
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Project 2 - Create New Account</h1>

<form id="form0" method="post" action="../createNewAccount.php">
    <fieldset id="billing">
        <legend>Create New Account</legend>
        <ul>
            <li> <label title="UserID" for="UserID">UserID <span>*</span></label> <input type="text" name="UserID" id="UserID" size="30" maxlength="30" onKeyUp="checkUsernameAvailability()" value="<?php if(!empty($_SESSION["UserID"])){echo($_SESSION["UserID"]);} ?>" /></li>
            <li> <span id="usernameAvailability" class="checkId"></span></li>
            <li> <label title="Passwd" for="Passwd">Password <span>*</span></label> <input type="password" name="Passwd" id="Passwd" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Passwd"])){echo($_SESSION["Passwd"]);} ?>" /></li>
            <li> <label title="PasswdConfirm" for="PasswdConfirm">Confirm Password <span>*</span></label> <input type="password" name="PasswdConfirm" id="PasswdConfirm" size="30" maxlength="30" value="<?php if(!empty($_SESSION["PasswdConfirm"])){echo($_SESSION["PasswdConfirm"]);} ?>" /></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Create New Account" />
    </fieldset>
</form>

<div id="errorMsg"><?php if(!empty($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);} ?></div>

<script type="text/javascript">
	document.getElementById("UserID").focus();
</script>
<script type="application/javascript" src="../js/checkUserID.js"></script>

</body>
</html>
