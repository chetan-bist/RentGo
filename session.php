<?PHP
require "partials/dbconnect.php";
session_start();
$id = $_SESSION["id"];
$sql = "select * from users where id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>