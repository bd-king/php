
<?php
//$hostname = "127.0.0.1";
$hostname = "localhost";
$username = "root";
$password = "";
$database = "database";

$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//mysql_connect($hostname,$username,$password);
//mysql_select_db($database);
?>