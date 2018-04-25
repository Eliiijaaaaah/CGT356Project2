<form id="form0" method="post" action="login.php">
    <fieldset id="info">
        <legend>Login</legend>
        <ul>
            <li> <label title="UserID" for="UserID">UserID <span>*</span></label> <input type="text" name="UserID" id="UserID" size="30" maxlength="30" value="<?php if(!empty($_SESSION["UserID"])){echo($_SESSION["UserID"]);} ?>" /></li>
            <li> <label title="Passwd" for="Passwd">Password <span>*</span></label> <input type="password" name="Passwd" id="Passwd" size="30" maxlength="30" value="<?php if(!empty($_SESSION["Passwd"])){echo($_SESSION["Passwd"]);} ?>" /></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Login" />
    </fieldset>
</form>

<div id="errorMsg"><?php if(!empty($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);} ?></div>

<div id="newLogin"><a href="includes/newAccount.php">Create New Login</a></div>

<script type="text/javascript">
	document.getElementById("UserID").focus();
</script>
