<?PHP
  require "session.php";
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('location: login.php');
}
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
  </head>
  <body>
  <div id="page1-content">
    <!-- Navbar -->
    <header>
    <div id="cursor">
          <!-- <h5>Play Reel</h5> -->
        </div>
      <div class="nav container">
        <!-- logo -->
        <a href="homepage.php" class="logo"><i class="bx bx-home"></i>RentGo</a>

      </div>
    </header>
    <!-- Sign Up -->
    <div class="login container">
      <div class="login-container">
        <h2>Personal and account <br>information</h2>

        <form action="/RENTGO/profilepage.php" method="post">
          <span>Full Name</span>
          <input type="text" name="fullname" id="" value="<?php  echo $row['FullName'];?>" required />
          <span>Your email address</span>
          <input
            type="email"
            name="email"
            id=""
            value="<?php echo $row['email'];?>"
            required
          />
          <span>Phone</span>
          <input
            type="tel"
            name="phone"
            id=""
            value="<?php echo $row['phone'];?>"
            required
          />
          <input type="submit" value="Save Change" class="buttom" />
          <a href="homepage.php" class="btn">Cancel</a>

        </form>
      </div>
      <!-- Log In Image -->
      <div class="login-image">
        <img src="img/profilepage.svg" alt="">
      </div>
    </div>
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
    </div>
  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"
      integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js"
      integrity="sha512-LQQDtPAueBcmGXKdOBcMkrhrtqM7xR2bVrnMtYZ8ImAZhFlIb5xrMqQ6uZviyeSB+4mYj89ta8niiCIQM1Gj0w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script/script.js"></script>
  </body>
</html>

<!-- php start -->
<?php


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      include 'partials/dbconnect.php';
    $fullname = $_POST['fullname'];
 	  $email = $_POST['email'];
    $phone = $_POST['phone'];
    session_start();
    $username=$_SESSION['$username'];

    
            $update = "UPDATE users SET FullName='$fullname', email='$email', phone='$phone' where users.email='$email'";
  
            $query= mysqli_query($conn,$update);

    if($query){
       echo
       "
       <script>
       swal({
         title: 'Success',
         text: 'Update successfully',
         icon: 'success',
         });
           </script>

       ";

    }else{

       echo
       "
       <script>
       swal({
         title: 'Failed',
         text: 'Some issue please try again',
         icon: 'error',
         });
           </script>

       ";


    }


 }


?>