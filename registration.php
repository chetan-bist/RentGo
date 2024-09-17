<!-- php Start -->
<?php


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      include 'partials/dbconnect.php';
    $fullname = $_POST['fullname'];
 	  $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $id = substr(str_shuffle(str_repeat("0123456789abcde",10)),0,5);
    $username = substr(str_shuffle(str_repeat("0123456789",10)),0,4);
    $username = "$fullname.$username";
    $image = "profileicon.svg";


    $select = "SELECT * FROM users WHERE email='$email' && FullName='$fullname'";

    $query = mysqli_query($conn, $select);

    if(mysqli_num_rows($query) > 0)
    {
      echo
        "
        <script>
        swal('Access Denied!','User Already exist!','error');
            </script>

        ";
    }elseif(strlen($phone)!=10){
      echo
        "
        <script>
        swal('Access Denied!','s!','error');
            </script>

        ";
    }
    else{
                $insert = "INSERT INTO users(id,fullname,username,email,phone,password,type,image)values('$id','$fullname','$username','$email','$phone','$password','user','$image')";

                $query = mysqli_query($conn, $insert);
                header('location:login.php');
            }


 }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RentGo</title>
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
        <a href="index.php" class="logo"><i class="bx bx-home"></i>RentGo</a>

        <!-- Log In button -->
        <a href="login.php" class="btn">Log In</a>
      </div>
    </header>
    <!-- Sign Up -->
    <div class="login container">
      <div class="login-container">
        <h2>Welcome, Let's get <br>started</h2>
        <p>Already have account <a href="login.php">Log In</a></p>
        <!-- Login Form -->
        <form action="/RENTGO/registration.php" method="post">
          <span>Full Name</span>
          <input type="text" name="fullname" id="" placeholder="Your Name" required />
          <span>Enter your email address</span>
          <input
            type="email"
            name="email"
            id=""
            placeholder="yourmail@gmail.com"
            required
          />
          <span>Phone</span>
          <input
            type="tel"
            name="phone"
            id=""
            placeholder="Enter your  number"
            required
          />
          <span>Enter your password</span>
          <input
            type="password"
            name="password"
            id=""
            placeholder="At least 8"
            required
          />
          <input type="submit" value="Sign Up" class="buttom" />
          <a href="login.php">Already have account</a>
        </form>
      </div>
      <!-- Log In Image -->
      <div class="login-image">
        <img src="img/Sign-Up.svg" alt="">
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



