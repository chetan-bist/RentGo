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
    <title>RentGo</title>
    <link rel="stylesheet" href="style/index.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
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
            <a href="index.html" class="logo"><i class="bx bx-home"></i>RentGo</a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu" />
            <label for="menu"><i class="bx bx-menu" id="menu-icon"></i></label>
        <!-- Nav List -->
              <ul class="navbar">
                <li><a href="homepage.php?page=home">Home</a></li>
                <li><a href="homepage.php?page=About">About</a></li>
                <li><a href="homepage.php?page=Sales">Sales</a></li>
                <li><a href="homepage.php?page=Rooms">Rooms</a></li>
              </ul>
       <!-- profile icon -->
              <div class="profile">
                  <img
                    src="img/<?php echo $row["image"];?>"
                    alt=""
                    class="chetan"
                    id="profile"
                    onclick="toggleMenu()"
                  />
                  <h5><?php echo $row["FullName"];?></h5>
                </div>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu open-menu" >
            <div class="user-info">
              <img src="img/<?php echo $row["image"];?>" alt=""class="chetan">
              <h5><?php  echo $row["FullName"];?> </h5>
            </div>
            <hr>

            <a href="profilepage.php"class="sub-menu-link">
              <i class='bx bx-user-circle'></i>
              <p>Edit Profile</p>
              <span>></span>
            </a>

            <a href="picture.php"class="sub-menu-link">
              <i class='bx bx-user-circle'></i>
              <p>Update Profile Picture</p>
              <span>></span>
            </a>

            <a href="Setting.php"class="sub-menu-link">
              <i class='bx bx-cog' ></i>
              <p>Settings & Privacy</p>
              <span>></span>
            </a>

            <a href="#"class="sub-menu-link">
              <i class='bx bx-help-circle' ></i>
              <p>Help & Support</p>
              <span>></span>
            </a>

            <a href="rooms.php"class="sub-menu-link">
              <i class='bx bx-bed'></i>
              <p>Rooms</p>
              <span>></span>
            </a>

            <a href="Users.php"class="sub-menu-link">
              <i class='bx bx-user'></i>
              <p>Users</p>
              <span>></span>
            </a>

            <a href="logout.php"class="sub-menu-link">
              <i class='bx bx-log-out' ></i>
              <p>Logout</p>
              <span>></span>
            </a>

          </div>

        </div>
      </div>
    </header>
    <!-- Home -->
    <section class="home container" id="home">
      <div class="home-text">
        <h1>Find Your Next <br />Perfect Place To <br />Live.</h1>
      </div>
    </section>

    <!-- About -->
    <section class="about container" id="about">
      <div class="about-img">
        <img src="img/about.jpg" alt="" />
      </div>
      <div class="about-text">
        <span>About Us</span>
        <h2>
          We Provide The Best <br />
          Room For you !
        </h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam
          aspernatur magni dolor nam vitae eaque, tenetur molestiae facilis,
          deleniti possimus unde sint iste labore ipsum tempore obcaecati
          adipisci? Assumenda, earum!
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam quidem
          beatae neque fugit minima nemo aspernatur, distinctio, ratione qui
          error inventore veniam est, sint odit et nobis officia animi
          consectetur?
        </p>
        <a href="#" class="btn">Learn More</a>
      </div>
    </section>
    <!-- Sales -->
    <section class="sales container" id="sales">
      <!-- Box 1 -->
      <div class="box">
        <i class="bx bx-user"></i>
        <h3>Make Your Dream True</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum
          sequi minima corrupti, debitis tempore deserunt ipsam est asperiores
          aliquam error labore.
        </p>
      </div>
      <!-- Box 1 -->
      <div class="box">
        <i class="bx bx-desktop"></i>
        <h3>Start Your Membership</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum
          sequi minima corrupti, debitis tempore deserunt ipsam est asperiores
          aliquam error labore.
        </p>
      </div>
      <!-- Box 3 -->
      <div class="box">
        <i class="bx bx-home"></i>
        <h3>Enjoy Your New Home</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum
          sequi minima corrupti, debitis tempore deserunt ipsam est asperiores
          aliquam error labore.
        </p>
      </div>
    </section>
    <!-- Rooms -->
    <section class="rooms container" id="rooms">
      <div class="heading">
        <span>Recent</span>
        <h2>Our Featured Rooms</h2>
        <p>
          Lorem ipsum, dolor sit amet consectetur <br />adipisicing elit.
          Repellat, cumque.
        </p>
      </div>
      <div class="rooms-container container">
        <!-- box1 -->
        <div class="box">
          <img src="img/room1.jpg" alt="" />
          <h3>Rs 5000</h3>
          <div class="content">
            <div class="text">
              <h3>The Place</h3>
              <p>KTM</p>
            </div>
            <div class="icon">
              <i class="bx bx-bed"><span>1</span></i>
              <i class="bx bx-bath"><span>1</span></i>
            </div>
          </div>
        </div>
        <!-- box2 -->
        <div class="box">
          <img src="img/room2.jpg" alt="" />
          <h3>Rs 5000</h3>
          <div class="content">
            <div class="text">
              <h3>The Place</h3>
              <p>MNR</p>
            </div>
            <div class="icon">
              <i class="bx bx-bed"><span>1</span></i>
              <i class="bx bx-bath"><span>1</span></i>
            </div>
          </div>
        </div>
        <!-- box3 -->
        <div class="box">
          <img src="img/room3.jpg" alt="" />
          <h3>Rs 5000</h3>
          <div class="content">
            <div class="text">
              <h3>The Place</h3>
              <p>Aatariya</p>
            </div>
            <div class="icon">
              <i class="bx bx-bed"><span>1</span></i>
              <i class="bx bx-bath"><span>1</span></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- NewsLetter -->
    <section class="newsletter container">
      <h2>Have Question in mind? <br />Let us help you</h2>
      <form action="">
        <input
          type="email"
          name=""
          id="email-box"
          placeholder="yourmail@gmail.com"
          required
        />
        <input type="submit" value="Send" class="btn" />
      </form>
    </section>
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
    <script>
      let subMenu = document.getElementById("subMenu");
      function toggleMenu(){
        subMenu.classList.toggle("open-menu");
      }
    </script>
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
