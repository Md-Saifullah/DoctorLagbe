<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--         
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url("/bootstrap/css/bootstrap.css") ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url("/bootstrap/css/mannual.css") ?>" />
  <link rel="icon" type="image/png" href="<?= base_url("/favicon.ico") ?>" />
  <title>Login</title>
</head>

<body>
  <div class="header fixed-height">
    <a href="<?= base_url("/Home") ?>" class="logo ms-5 mb-3">
      <img height="60" width="140" src="<?= base_url("/images/j1.png") ?>" alt="" class="rounded">
      <!--<label>DoctorLagbe</label>-->
    </a>
    <div class="header-right">
      <div class="row-5 float-right">
        <a class="" href="<?= base_url("/Home") ?>">Home</a>
        <?php
        if (isset($_SESSION['email'])) {
          /**type check
           * assign button according to type
           * for admin : doctorsignup, manageuser, manageappointment
           * for user : appointmentHistory
           * for doctor : see appointment list
           * logout, profile and change password are common for all
           */
          if ($_SESSION['type'] == "user") { ?>
            <a class="" href="<?= base_url("/AppointmentController/getHistory") ?>">Appointment History</a>
          <?php } else if ($_SESSION['type'] == "doctor") { ?>
            <a class="" href="<?= base_url("/AppointmentController/getAppointmentList") ?>">Appointment List</a>
          <?php } else { ?>
            <a class="me-2" href="<?= base_url("/AllUserInfoController") ?>">Manage User</a>
            <div class="dropdown float-left">
              <a>SignUp</a>
              <div class="dropdown-content">
                <a href="<?= base_url("/SignupController/userSignup") ?>">User</a>
                <a href="<?= base_url("/SignupController/doctorSignup") ?>">Doctor</a>
                <a href="<?= base_url("/SignupController/adminSignup") ?>">Admin</a>
              </div>
            </div>
            <!-- <a class="" href="<?= base_url("/SignupController/doctorSignup") ?>">SignUp a Doctor</a>
                        <a class="me-2" href="<?= base_url("/SignupController") ?>">SignUp a User</a> -->
          <?php } ?>
          <a class="" href="http://localhost:8080/AllUserInfoController/showProfile">Profile</a>
          <a class="" href="<?= base_url("/LogoutController") ?>">Logout</a>

        <?php
        } else { ?>
          <a class="active" href="<?= base_url("/LoginController") ?>">Login</a>
          <a class="me-2" href="<?= base_url("/SignupController/userSignup") ?>">Signup</a>
        <?php
        }
        ?>
      </div>
      
    </div>
  </div>

  <div class="container col-4 pt-2 pb-7 ps-5 bg-light">
  <div class="label h1 text-center p-4 bg-lgreen">Login </div> <b>
            <hr>
        </b>
    <form name="form" onsubmit="return check()" action="<?= base_url("/LoginController/checkLogin") ?>" class="form-group p-3" method="POST">
      Email <input type="email" class="form-control my-2" name="email" placeholder="example@mail.com" />
      Password <input type="password" class="form-control my-2" name="password" placeholder="Enter Password" />

      <div class="mt-3 col-3 float-right">
        <input type="submit" value="Login" class="form-control sign-btn">
      </div>

    </form>
    <?php

    if (session()->getFlashdata('status')) {
    ?>
      <div class="mt-6 container for-warning clear-align">
        <?= (session()->getFlashdata('status')) ?>
      </div>

    <?php
      unset($_SESSION['status']);
    }
    ?>

  </div>
  <div class="footer footer-color">
    <p> All rights reserved &copy; HalfCircle</p>
  </div>


  <script>
    function check() {

      var email = document.form.email.value;
      var password = document.form.password.value;

      if (email == "") {
        alert("Email field can not be empty");
        return false;
      }
      if (password == "") {
        alert("Password field can not be empty");
        return false;
      }

    }
  </script>

</body>

</html>