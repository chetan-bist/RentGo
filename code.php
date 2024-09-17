<?php

require 'partials/dbconnect.php';
if(isset($_POST['save_form']))
{
    session_start();
    $id = $_SESSION["id"];
    $sql = "select * from users where id='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
   
    $Current_password = mysqli_real_escape_string($conn, $_POST['Current_password']);
    $New_password = mysqli_real_escape_string($conn,$_POST['New_password']);
    $Confirm_password = mysqli_real_escape_string($conn, $_POST['Confirm_password']);

    $oldpwd = $row['password'];

    if(!($oldpwd == $Current_password))
    {
        $res = [
            'status' => 422,
            'message' => "$oldpwd"
        ];
        echo json_encode($res);
        return;
    }elseif(!($New_password == $Confirm_password))
    {
        $res = [
            'status' => 500,
        ];
        echo json_encode($res);
        return;
    }
        $update = "UPDATE users SET password='$New_password' where password='$Current_password' and id='$id'";
        $query_run = mysqli_query($conn,$update);
        
        if($query_run)
        {
            $res = [
                'status' => 200,
            ];
            echo json_encode($res);
            return;
        }
    
}

if(isset($_POST['save_user']))
{
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $id = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,5);
        $username = substr(str_shuffle(str_repeat("0123456789",10)),0,4);
        $username = "$fullname.$username";
        $image = "profileicon.svg";

    
    if($fullname == NULL || $email == NULL || $password == NULL || $phone == null)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

                        $query = "insert into users(id,fullname,username,email,phone,password,type,image)values('$id','$fullname','$username','$email','$phone','$password','$type','$image')";

                        $query_run= mysqli_query($conn,$query);

    if($query_run)
    {
        // header("location:admin.php");
        $res = [
            'status' => 200,
            'message' => 'user Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'user Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_user']))
{
    $id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
            $query = "UPDATE users SET FullName='$fullname', email='$email', phone='$phone', type='$type' where users.id='$id'";
            $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Room Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Room Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_GET['user_id']))
{
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $query = "SELECT * FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $user = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'User Fetch Successfully by id',
            'data' => $user
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'User Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'User Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'User Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['save_room']))
{
    $id = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,5);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $ownername = mysqli_real_escape_string($conn,$_POST['ownername']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $bed = mysqli_real_escape_string($conn, $_POST['bed']);
    $bath = mysqli_real_escape_string($conn, $_POST['bath']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $imagename = mysqli_real_escape_string($conn, $_FILES['image']['name']);
    $tmpName = mysqli_real_escape_string($conn, $_FILES['image']['tmp_name']);

    
    $random = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,2);
    $imageName= "image$random.jpg";
    
    if($address == NULL || $ownername == NULL || $phone == NULL || $price == NULL || $imagename ==null)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO rooms(id,address,ownername,phone,bed,bath,price,image)VALUES('$id','$address','$ownername','$phone','$bed','$bath','$price','$imagename')";
                        $query_run = mysqli_query($conn,$query);
                        move_uploaded_file($tmpName, 'img/' . $imagename);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'room Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'room Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_room']))
{
    $id = mysqli_real_escape_string($conn, $_POST['room_id']);

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $ownername = mysqli_real_escape_string($conn,$_POST['ownername']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $bed = mysqli_real_escape_string($conn, $_POST['bed']);
    $bath = mysqli_real_escape_string($conn, $_POST['bath']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $imagename = mysqli_real_escape_string($conn, $_FILES['image']['name']);
    $tmpName = mysqli_real_escape_string($conn, $_FILES['image']['tmp_name']);

    
    if($imagename == null)
    {
            $query = "UPDATE rooms SET address='$address', ownername='$ownername', phone='$phone', bed='$bed', bath='$bath', price='$price' where rooms.id='$id'";
            $query_run = mysqli_query($conn, $query);

    }else{
            $random = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,2);
            $imageName= "image$random.jpg";


            $query = "UPDATE rooms SET address='$address', ownername='$ownername', phone='$phone', bed='$bed', bath='$bath', price='$price', image='$imagename' where rooms.id='$id'";
            $query_run = mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'img/' . $imagename);

    }
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Room Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Room Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_GET['room_id']))
{
    $room_id = mysqli_real_escape_string($conn, $_GET['room_id']);

    $query = "SELECT * FROM rooms WHERE id='$room_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $room = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Room Fetch Successfully by id',
            'data' => $room
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'room Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_room']))
{
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);

    $query = "DELETE FROM rooms WHERE id='$room_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'room Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'room Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>