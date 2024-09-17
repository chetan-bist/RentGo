<?PHP
        require 'partials/dbconnect.php';
        require "session.php";
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
        {
        header('location: login.php');
        }
       
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css code -->
    <link rel="stylesheet" href="style/index.css" />

    <!-- icon cdn -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>RentGo</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <!-- nabbar -->
 <div id="page1-content">
      <!-- <header> -->
        <div id="cursor">
          <!-- <h5>Play Reel</h5> -->
        </div>
        <div class="nav container">
          <!-- logo -->
          <a href="index.html" class="logo" style="text-decoration: none;"><i class="bx bx-home" ></i>RentGo</a>
          <!-- Menu Icon -->
          <input type="checkbox" name="" id="menu" />
          <label for="menu"><i class="bx bx-menu" id="menu-icon"></i></label>
         
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

          
  </div>


<!-- Add Student -->
<!-- <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveStudent">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Course</label>
                    <input type="text" name="course" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
        </div>
    </div>
</div> -->

<!-- Edit Student Modal -->
<!-- <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="room_id" id="room_id" >

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Course</label>
                    <input type="text" name="course" id="course" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
        </div>
    </div>
</div> -->

<!-- View Student Modal -->
<div class="modal fade" id="roomViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><a href="Users.php" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>Contact Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Room address</label>
                    <p id="view_address" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="">Owner Name</label>
                    <p id="view_ownername" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Phone Number</label>
                    <p id="view_phone" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>PHP Ajax CRUD without page reload using Bootstrap Modal
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                            Add Student
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'partials/dbconnect.php';

                            $query = "SELECT * FROM rooms";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                            
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <div class='box'>
                                            <img src='img/<?= $student['image'] ?>' alt='' />
                                            <h3>Rs <?= $student['price'] ?></h3>
                                            <div class='content'>
                                            <div class='text'>
                                                <h3>The Place</h3>
                                                <p><?= $student['address'] ?></p>
                                            </div>
                                            <div class='icon'>
                                                <i class='bx bx-bed'><span><?= $student['bed'] ?></span></i>
                                                <i class='bx bx-bath'><span><?= $student['bath'] ?></span></i>
                                            </div>
                                            <button type="button" value="<?=$student['id'];?>" class="viewRoomBtn btn btn-info btn-sm">View</button>
                                    </div>
                                    

                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div> -->

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
    <?php
                            require 'partials/dbconnect.php';

                            $query = "SELECT * FROM rooms";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                            
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <div class='box'>
                                            <img src='img/<?= $student['image'] ?>' alt='' />
                                            <h3>Rs <?= $student['price'] ?></h3>
                                            <div class='content'>
                                            <div class='text'>
                                                <h3>The Place</h3>
                                                <p><?= $student['address'] ?></p>
                                            </div>
                                            <div class='icon'>
                                                <i class='bx bx-bed'><span><?= $student['bed'] ?></span></i>
                                                <i class='bx bx-bath'><span><?= $student['bath'] ?></span></i>
                                            </div>
                                            
                                    </div>
                                    <button type="button" value="<?=$student['id'];?>" class="viewRoomBtn btn btn-info btn-sm">View</button>

                                    </div>
                                    <?php
                                }
                            }
                            ?>

    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
       
        $(document).on('click', '.viewRoomBtn', function () {

            var room_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?room_id=" + room_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_address').text(res.data.address);
                        $('#view_ownername').text(res.data.ownername);
                        $('#view_phone').text(res.data.phone);
                        // $('#view_bed').text(res.data.bed);
                        // $('#view_bath').text(res.data.bath);
                        // $('#view_price').text(res.data.price);




                        $('#roomViewModal').modal('show');
                    }
                }
            });
        });

    </script>

</body>
</html>