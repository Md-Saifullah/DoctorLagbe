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
    <title>Doctor Sign Up</title>
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
                    <a class="me-2" href="<?= base_url("/SignupController/userSignup") ?>">Signup</a>
                <?php
                }
                ?>
            </div>
        
        </div>
    </div>

    <div class="container mb-6">
        <div class="col-10 ms-6 px-7 pb-8 bg-light">
        <div class="label h4 text-center p-4 mt-2 bg-lgreen">Sign Up a Doctor</div> <b>
            <hr>
        </b>
            <form name="form" onsubmit="return check()" action="<?= base_url("/SignupController/saveDoctorSignup") ?>" class="form-group" method="POST">

                <div class="row pt-5">
                    <div class="col-3 text-bold ">
                        <label class="form-label ">Name</label>
                    </div>

                    <div class="col-1 for-colon ">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="fname" placeholder="first name">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="lname" placeholder="last name">

                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Qualification</label>
                    </div>

                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input name="qualification" class="form-control">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Expertise</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <select name="expertise" id="expertise" class="form-control">
                            <option value="allergists">Allergists</option>
                            <option value="dermatologists">Dermatologists</option>
                            <option value="ophthalmologists">Ophthalmologists</option>
                            <option value="gynecologists">Gynecologists</option>
                            <option value="cardiologists">Cardiologists</option>
                            <option value="endocrinologists">Endocrinologists</option>
                            <option value="gastroenterologists">Gastroenterologists</option>
                            <option value="nephrologists">Nephrologists</option>
                            <option value="neurologists">Neurologists</option>
                            <option value="psychiatrists">Psychiatrists</option>
                        </select>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Gender</label>
                    </div>

                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">

                        <div class="form-check form-check-inline ms-2 mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Moda">
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>
                    </div>
                </div>





                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Blood Group</label>
                    </div>

                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>

                    <div class="col-1">
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


                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Contact No.</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="contact" placeholder="Contact No.">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Email</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email" placeholder="example@mail.com">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Password</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="password" minlength="5" placeholder="Enter password">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Age</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="age" placeholder="Enter Age">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Designation</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="designation" placeholder="Enter Dessignation">
                    </div>
                </div>


                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Organization</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="organization" placeholder="Enter Organization">
                    </div>
                </div>

                

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Schedule</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="schedule" placeholder="Enter Schedule">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Chamber</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="chamber" placeholder="Enter Chamber">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Address</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-3 text-bold">
                        <label class="form-label ">Visit Fees</label>
                    </div>
                    <div class="col-1 for-colon">
                        <label class="form-label ">:</label>
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="fees" placeholder="Enter Fees">
                    </div>
                </div>
                <div class="col-2 float-right mb-5 mt-3 me-5">
                    <input type="submit" value="SignUp" class="py-2 for-colon form-control sign-btn">

                </div>
            </form>
        </div>
    </div>


    <div class="footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>

    <script>
        function check() {
            var title = document.form.title.value;
            var fname = document.form.fname.value;
            var lname = document.form.lname.value;
            var qualification = document.form.qualification.value;
            var expertise = document.form.expertise.value;
            var gender = document.form.gender.value;
            var bloodgroup = document.form.bloodgroup.value;
            var contact = document.form.contact.value;
            var email = document.form.email.value;
            var password = document.form.password.value;
            var age = document.form.age.value;
            var designation = document.form.designation.value;
            var organization = document.form.organization.value;
            var address = document.form.address.value;
            var schedule = document.form.schedule.value;
            var chamber = document.form.chamber.value;
            var fees = document.form.fees.value;
            if (title == "") {
                alert("Title field can not be empty");
                return false;
            }
            if (fname == "") {
                alert("First Name field can not be empty");
                return false;
            }
            if (lname == "") {
                alert("Last Name field can not be empty");
                return false;
            }
            if (qualification == "") {
                alert("Qualification field can not be empty");
                return false;
            }
            if (expertise == "") {
                alert("Expertise field can not be empty");
                return false;
            }
            if (gender == "") {
                alert("Gender field can not be empty");
                return false;
            }
            if (bloodgroup == "") {
                alert("Blood Group field can not be empty");
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
            if (password == "") {
                alert("Password field can not be empty");
                return false;
            }
            if (age == "") {
                alert("Age field can not be empty");
                return false;
            }
            if (designation == "") {
                alert("Designation field can not be empty");
                return false;
            }
            if (organization == "") {
                alert("Organization field can not be empty");
                return false;
            }
            if (address == "") {
                alert("Address field can not be empty");
                return false;
            }
            if (schedule == "") {
                alert("Schedule field can not be empty");
                return false;
            }
            if (chamber == "") {
                alert("Chamber field can not be empty");
                return false;
            }
            if (fees == "") {
                alert("Fees field can not be empty");
                return false;
            }
        }
    </script>

</body>

</html>