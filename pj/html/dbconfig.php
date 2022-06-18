?<php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";
$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
$conn = mysql_select_db($dbname) or die('database selection problem');
?>