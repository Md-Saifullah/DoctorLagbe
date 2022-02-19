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
    <title>User Sign Up</title>
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
                            <a class="active">SignUp</a>
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
                    <a class="" href="<?= base_url("/LoginController") ?>">Login</a>
                    <a class=" active me-2" href="<?= base_url("/SignupController/userSignup") ?>">Signup</a>
                <?php
                }
                ?>
            </div>
          
        </div>
    </div>

  <div class="container mb-6 col-8 pt-2 ps-5 bg-light">
  <div class="label h1 text-center p-4 bg-lgreen">Sign Up </div> <b>
            <hr>
        </b>
    <form name="form" onsubmit="return check()" action="<?= base_url("/SignupController/saveUserSignup") ?>" class="form-group p-3 mb-5" method="POST">
      <div class="row py-2">

        <div class="col">
          Name <input type="text" class="form-control mt-2" name="fname" placeholder="First Name" />
        </div>
        <div class="col">
          <label for=""> </label>
          <input type="text" class="form-control mt-2" name="lname" placeholder="Last Name" />
        </div>

      </div>
      Contact No. <input type="text" class="form-control my-2" name="contact" placeholder="Enter Contact No." />
      Email <input type="email" class="form-control my-2" name="email" placeholder="Enter Email" />
      Address <input type="text" class="form-control my-2" name="address" placeholder="Enter Address" />



      <div class="row py-2">

        <div class="col-2">
          Age <input type="number" class="form-control my-2" name="age" placeholder="Enter Age" />
        </div>


        <div class="col-2">
          <div class="row ps-2 pb-2">
            Blood Group
          </div>

          <div class="col-6">
            <select name="bloodgroup" id="bloodgroup" class="form-control">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>

          </div>

        </div>

        <div class="col">
          <div class=" row ps-3 pb-3">
            Gender :
          </div>
          <div class="row-2">
            <input type="radio" name="gender" value="Male" class="ms-2" /> Male
            <input type="radio" name="gender" value="Female" class="ms-2" /> Female
            <input type="radio" name="gender" value="Others" class="ms-2" /> Others
          </div>
        </div>
      </div>

      Password <input type="password" class="form-control my-2" name="password" minlength="5" placeholder="Enter Password" />
      Confirm Password <input type="password" class="form-control my-2" name="confirmpassword" minlength="5" placeholder="Confirm Password" />
      <div class=" my-5 col-2 float-right">
        <input type="submit" value="Signup" class="form-control sign-btn">
      </div>

    </form>

  </div>
  <div class="footer footer-color">
    <p> All rights reserved &copy; HalfCircle</p>
  </div>

  <script>
    function check() {
      var fname = document.form.fname.value;
      var lname = document.form.lname.value;
      var email = document.form.email.value;
      var contact = document.form.contact.value;
      var gender = document.form.gender.value;
      var age = document.form.age.value;
      var address = document.form.address.value;
      var bloodgroup = document.form.bloodgroup.value;
      var password = document.form.password.value;
      var confirmpassword = document.form.confirmpassword.value;

      if (fname == "") {
        alert("First Name field can not be empty");
        return false;
      }
      if (lname == "") {
        alert("Last Name field can not be empty");
        return false;
      }
      if (contact == "") {
        alert("Contact field can not be empty");
        return false;
      }
      if (email == "") {
        alert("Email field can not be empty");
        return false;
      }
      if (address == "") {
        alert("Address field can not be empty");
        return false;
      }
      if (age == "") {
        alert("Age field can not be empty");
        return false;
      }
      if (bloodgroup == "") {
        alert("Blood Group field can not be empty");
        return false;
      }
      if (gender == "") {
        alert("Gender field can not be empty");
        return false;
      }
      if (password == "") {
        alert("Password field can not be empty");
        return false;
      }
      if (confirmpassword == "") {
        alert("Confirm Password field can not be empty");
        return false;
      }
      if (password != confirmpassword) {
        alert("Password & Confirm Password are not same");
        return false;
      }
    }
  </script>

</body>

</html>