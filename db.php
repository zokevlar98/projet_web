<?php

$server = "localhost";
$user = "root";
$password_db = "";
$name_db = "stock";
$connection = null;

try
{
    $connection = mysqli_connect($server, $user, $password_db, $name_db);
}
catch(mysqli_sql_exception){
    echo "Not connected! please reload <br>";
}
// if ($connection)
// {
//     echo "connected!";
// }
?>