<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "rentgo";
// $server = "sql303.infinityfree.com";
// $username = "if0_36557775";
// $password = "VJzQY4q2oo53xP";
// $database = "if0_36557775_rentgo";

// $server = "sql107.infinityfree.com";
// $username = "if0_36569248";
// $password = "I0rVmmIU6db";
// $database = "if0_36569248_rentgo";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn)
{

    die("Error". mysqli_connect_error());
}
?>