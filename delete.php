
<?php
session_start();
include 'partials/dbconnect.php';
 if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from rooms where rooms.id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('location:rooms.php');
    }
    else{
        die(mysqli_errno($con));
    }
 }else{
    $id=$_GET['delete'];
    $sql="delete from users where users.id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('location:Users.php');
    }
    else{
        die(mysqli_errno($con));
    }
 }


?>