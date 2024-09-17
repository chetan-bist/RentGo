<?PHP
require 'session.php';
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
    <!-- Log In -->
    <div class="login container">
      <div class="login-container">
        <h2>password and security</h2>
    
        <!-- Login Form -->
        <!-- <form action="/RENTGO/Setting.php" method="post"> -->
          <form action="" id="saveForm">
          <span>Enter your Current password</span>
          <input
            type="password"
            name="Current_password"
            id="1"
            placeholder="Current password"
            required
          />
          <span>New password</span>
          <input
            type="password"
            name="New_password"
            id="2"
            placeholder="New password"
            required
          />
          <span>Confirm new password</span>
          <input
            type="password"
            name="Confirm_password"
            id="3"
            placeholder="Confirm new password"
            required
          />
          <input type="submit" value="Save Change" class="buttom" />
      
        </form>
        
      </div>
      <!-- Log In Image -->
      <div class="login-image">
        <img src="img/password1.svg" alt="">
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

            $(document).on('submit', '#saveForm', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_form", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                      // alert(res.message);
                      swal('Access Denied!','Your current password does not match','error');
                      $('#saveForm').load(location.href + " #saveForm");

                    }else if(res.status == 200){

                        swal({
                          title: 'Success',
                          text: 'Password change successfully',
                          icon: 'success',
                          });

                          $('#saveForm').load(location.href + " #saveForm");

                    }else if(res.status == 500) {
                        swal('Access Denied!','Confirm password  not matching','error');

                        $('#saveForm').load(location.href + " #saveForm");
                    }
                }
            });

        });

  </script>
  </body>
</html>
