<?PHP
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <title>RentGo.com</title>
    <link rel="stylesheet" href="style/index.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    
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
      
<!-- Add Student -->
<div class="modal fade" id="roomAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><a href="Users.php" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>Add New Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveRoom">
            <div class="modal-body">

                               <div class="mb-3">
                                    <label for="">Enter room address</label>
                                    <input type="text" name="address" id="" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter owner name</label>
                                    <input type="text" name="ownername" id="" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter contact number</label>
                                    <input type="text" name="phone" id="" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter room price</label>
                                    <input type="text" name="price" id="" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="title">Bed</label>
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="bed">
                                            <option selected value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                            <label for="title">bath</label>
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="bath">
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                            
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Please room picture input</label>
                                <input type="file" name="image" class="form-control-file" id="image1">
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

<!-- Edit Student Modal -->
<div class="modal fade" id="roomEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><a href="Users.php" class="logo" style="text-decoration: none;"><i class="bx bx-home"></i>RentGo</a>Update Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateRoom">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="room_id" id="room_id" >

                                <div class="mb-3">
                                    <label for="">Enter room address</label>
                                    <input type="text" name="address" id="address" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter owner name</label>
                                    <input type="text" name="ownername" id="ownername" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter contact number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Enter room price</label>
                                    <input type="text" name="price" id="price" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="title">Bed</label>
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="bed">
                                            <option selected value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                            <label for="title">bath</label>
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="bath">
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                            
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Please room picture input</label>
                                <input type="file" name="image" class="form-control-file" id="image1">
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
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#roomAddModal">
                            Add Room
                        </button>
                </div>
                
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Room Address</th>
                                <th scope="col">Owner name</th>
                                <th scope="col">Contact number</th>
                                <th scope="col">Price</th>
                                <th scope="col">bed</th>
                                <th scope="col">bath</th>
                                <th>Picture</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'partials/dbconnect.php';
                            $query="select *from rooms";
                            $query_run=mysqli_query($conn,$query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $student['id'] ?></td>
                                        <td><?= $student['address'] ?></td>
                                        <td><?= $student['ownername'] ?></td>
                                        <td><?= $student['phone'] ?></td>
                                        <td><?= $student['price'] ?></td>
                                        <td><?= $student['bed'] ?></td>
                                        <td><?= $student['bath'] ?></td>
                                        <td><img src='img/<?= $student['image'] ?>' alt='' style='width:70px; height:50px; border-radius: 5px;'></td>

                                        <td>
                                            <button type="button" value="<?=$student['id'];?>" class="editRoomBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$student['id'];?>" class="deleteRoomBtn btn btn-danger btn-sm">Delete</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>

        $(document).on('submit', '#saveRoom', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_room", true);

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

                        $('#roomAddModal').modal('hide');
                        $('#saveRoom')[0].reset();
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

        $(document).on('click', '.editRoomBtn', function () {

            var room_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?room_id=" + room_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#room_id').val(res.data.id);
                        $('#address').val(res.data.address);
                        $('#ownername').val(res.data.ownername);
                        $('#phone').val(res.data.phone);
                        $('#price').val(res.data.price);
                        $('#image1').text(res.data.image);

                        $('#roomEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateRoom', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_room", true);

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
                        $('#roomEditModal').modal('hide');
                    
                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

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

                        $('#view_name').text(res.data.name);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_course').text(res.data.course);

                        $('#roomViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteRoomBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var room_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_room': true,
                        'room_id': room_id
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