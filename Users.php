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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <title>RentGo.com</title>
    <link rel="stylesheet" href="style/index.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
     <!-- navbar -->
  <div class="nav container golu">
        <!-- logo -->
        <a href="index.html" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>
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
            <h5><?php  echo $row["FullName"];?></h5>
          </div>
      </div>

  <!-- Add New User -->

  <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><a href="Users.php" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>Add New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveUser">
            <div class="modal-body">

                               <div class="mb-3">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" id="" class="form-control" placeholder="Your name" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter your email address</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder="yourmail@gmail.com" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter your Phone number</label>
                                    <input type="text" name="phone" id="" class="form-control"placeholder="Phone number" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter your password</label>
                                    <input type="text" name="password" id="" class="form-control" placeholder="At least 8" />
                                </div>
                                <div class="form-group">
                                    <label for="title">User Typer</label>
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type">
                                              <option selected value="admin">Admin</option>
                                              <option value="user">User</option>
                                       </select>
                                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
        </div>
    </div>
</div>


  <!-- Edit User Modal -->
<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><a href="Users.php" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>Update User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateUser">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="user_id" id="user_id" >

                              <div class="mb-3">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Your name" />
                                </div>

                                <div class="mb-3">
                                    <label for="">Enter your email address</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="yourmail@gmail.com" />
                                </div>

                                <div class="mb-3">
                                    <label for="">Enter your Phone number</label>
                                    <input type="text" name="phone" id="phone" class="form-control"placeholder="Phone number" />
                                </div>
                                <div class="form-group">
                                    <label for="title">User Typer</label>
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type">
                                              <option selected value="admin">Admin</option>
                                              <option value="user">User</option>
                                       </select>
                                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- table -->
    <div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#userAddModal">
                            Add Room
                        </button>
                </div>
                
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col"> User Type</th>
                                <th>Picture</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'partials/dbconnect.php';
                            $query="select *from users";
                            $query_run=mysqli_query($conn,$query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $student['FullName'] ?></td>
                                        <td><?= $student['email'] ?></td>
                                        <td><?= $student['phone'] ?></td>
                                        <td><?= $student['type'] ?></td>
                                        <td><img src='img/<?= $student['image'] ?>' alt='' style='width:70px; height:50px; border-radius: 5px;'></td>

                                        <td>
                                            <button type="button" value="<?=$student['id'];?>" class="editUserBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$student['id'];?>" class="deleteUserBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
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
</div>
<!-- 
    <script>
      let subMenu = document.getElementById("subMenu");
      function toggleMenu(){
        subMenu.classList.toggle("open-menu");
      }
    </script> -->
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

$(document).on('submit', '#saveUser', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("save_user", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                swal('Access Denied!','All fields are mandatory','error');

            }else if(res.status == 200){

                $('#userAddModal').modal('hide');
                $('#saveUser')[0].reset();
                swal({
                  title: 'Success',
                  text: 'Room Update successfully',
                  icon: 'success',
                  });

              

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.editUserBtn', function () {

    var user_id = $(this).val();
    
    $.ajax({
        type: "GET",
        url: "code.php?user_id=" + user_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#fullname').val(res.data.FullName);
                $('#email').val(res.data.email);
                $('#phone').val(res.data.phone);
                $('#userEditModal').modal('show');
            }

        }
    });

});

$(document).on('submit', '#updateUser', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_user", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message);

            }else if(res.status == 200){

                swal({
                        title: 'Success',
                        text: 'Your data is Update successfully',
                        icon: 'success',
                        });
                $('#userEditModal').modal('hide');
            
                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.viewUserBtn', function () {

    var user_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "code.php?user_id=" + user_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#view_name').text(res.data.name);
                $('#view_email').text(res.data.email);
                $('#view_phone').text(res.data.phone);
                $('#view_course').text(res.data.course);

                $('#roomViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.deleteUserBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var user_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'delete_user': true,
                'user_id': user_id
            },
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 500) {

                    alert(res.message);
                }else{
                    swal({
                        title: 'Success',
                        text: 'Your data is Deleted successfully',
                        icon: 'success',
                        });

                    $('#myTable').load(location.href + " #myTable");
                }
            }
        });
    }
});

</script>

  </body>
</html>
