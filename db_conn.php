<?php
$server="localhost";
$username="root";
$password="";
$db="cimfr";

$con=mysqli_connect($server, $username, $password, $db);

if(!$con)
{
    echo "Not Connected to Database!";
    die("Connection Error");
}
else
{
    
}


?>