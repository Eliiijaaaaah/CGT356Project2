<?php
// Connect to MySQL from PHP
// Open DB connection and select DB to use
// The '@' bypasses the usual PHP error handling, so you get to deal with a
// failure return from pconnect yourself in the if statement below.
// If you leave off the '@' then any errors will automatically be thrown
@ $db = mysql_connect("localhost", "cgt356web1y", "Aardvark1y8533");
mysql_select_db("cgt356web1y");

// check to see if connection was successful
if(!$db)
{
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}
?>
