<?php
require 'partials/dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('location: login.php');
}

$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users where id='$sessionId'"));

  $id = $user["id"];
  $name = $user["FullName"];
  $image = $user["image"];
  $username = $user["Username"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RentGo.com</title>
    <link rel="stylesheet" href="style/index.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
    <!-- Navbar -->
    <header>
      <div class="nav container">
        <!-- logo -->
        <a href="index.html" class="logo"><i class="bx bx-home"></i>RentGo</a>
        <!-- profile icon -->
        <div class="profile">
          <img
            src="img/<?php echo $image?>"
            alt=""
            class="chetan"
            id="profile"
            onclick="toggleMenu()"
          />
          <h5>Hi,<?php echo $name;?>!</h5>
        </div>
      </div>
    </header>
    <!-- profile picture -->
    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
  
            <div class="popup-container">
             <div class="popup-box">
                 <h1>Hi,<?php echo $name;?>!</h1>
                    <p>@<?php echo $username;?></p>
                    <img src="img/<?php echo $image?>" alt="" id="profile-pic">
                        <label  for="input-file" id="pic">Update image</label>
                        <input type="file" name="image" accept=".jpeg, .png, .jpg" id="input-file">
                        <label class="bx1">Cancel</label>
        </div>
    </div>

    </form>

    <script>
                  document.getElementById("input-file").onchange =function(){
                document.getElementById('form').submit();
                
        }
    </script>
    
<!-- php start -->
<?php
if(isset($_FILES["image"]["name"])){

    $imageName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $random = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,2);
    $imageName= "image$random.jpg";
    
        $query = "UPDATE users set image = '$imageName' Where id ='$id'";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'img/' . $imageName);
    }

?>

    <!-- Footer -->
    <section class="footer">
      <div class="footer-container container">
        <h2><i class="bx bx-home"></i>RentGo</h2>
        <div class="footer-box">
          <h3>Quick Links</h3>
          <a href="#">Agency</a>
          <a href="#">Building</a>
          <a href="#">Rates</a>
        </div>
        <div class="footer-box">
          <h3>Locations</h3>
          <a href="#">KTM</a>
          <a href="#">MNR</a>
          <a href="#">Aatariya</a>
        </div>
        <div class="footer-box">
          <h3>Contact</h3>
          <a href="#">+977 (0)880 134 7869</a>
          <a href="#">yourmail@gmail.com</a>
          <div class="social">
            <a href="#"><i class="bx bxl-facebook"></i></a>
            <a href="#"><i class="bx bxl-whatsapp"></i></a>
            <a href="#"><i class="bx bxl-instagram"></i></a>
          </div>
        </div>
      </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
      <p>&#169; Chetan-Aryan All Right Reserved</p>
    </div>
  </body>
</html>