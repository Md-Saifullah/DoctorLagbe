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
    <title>Profile</title>
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
                    <a class="active" href="http://localhost:8080/AllUserInfoController/showProfile">Profile</a>
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


    <div class="mb-6">
        <?php
        $type = $_SESSION['type'];
        if ($type == 'doctor') { ?>
            <!-- echo "<pre>";
             print_r($doctor); -->
            <div class="container col-4 p-5 bg-light">

                <div class="card bg-light p-2" style="width: 100%; height: 100%;">
                    <div class="label h1 text-center p-4 bg-lgreen">Your Profile </div> <b>
                        <hr>
                    </b>
                    <h5 class="card-title"><b> Name: </b> <?= $doctor[0]['title'] . " " . $doctor[0]['dfname'] . " " . $doctor[0]['dlname'] ?> </h5>
                    <h6 class="card-text "> <b> Email: </b> <?= $doctor[0]['email'] ?> </h6>
                    <h6 class="card-text"> <b> User type: </b>Doctor</h6>
                    <h6 class="card-text "> <b> Blood Group: </b> <?= $doctor[0]['dbloodgroup'] ?> </h6>
                    <h6 class="card-text "> <b> Age: </b> <?= $doctor[0]['dage'] ?> </h6>
                    <h6 class="card-text "> <b> Gender: </b> <?= $doctor[0]['dgender'] ?> </h6>
                    <h6 class="card-text "> <b> Qualification: </b> <?= $doctor[0]['qualification'] ?> </h6>
                    <h6 class="card-text "> <b> Designation: </b> <?= $doctor[0]['designation'] ?> </h6>
                    <h6 class="card-text "> <b> Expertise: </b> <?= $doctor[0]['expertise'] ?> </h6>
                    <h6 class="card-text "> <b> Organization: </b> <?= $doctor[0]['organization'] ?> </h6>
                    <h6 class="card-text "> <b> chamber: </b> <?= $doctor[0]['chamber'] ?> </h6>
                    <h6 class="card-text "> <b> Schedule: </b> <?= $doctor[0]['schedule'] ?> </h6>
                    <h6 class="card-text "> <b> Address: </b> <?= $doctor[0]['daddress'] ?> </h6>
                    <h6 class="card-text "> <b> Contact: </b> <?= $doctor[0]['dcontact'] ?> </h6>
                    <h6 class="card-text "> <b> Fees: </b> <?= $doctor[0]['fees'] ?> </h6>


                    <a class="btn btn-danger btn-sm  mt-3" href="<?= base_url("/AllUserInfoController/changePassword") ?>"> Change Password </a>
                    <a class="btn btn-primary btn-sm mt-3 my-3" href="<?= base_url("/AllUserInfoController/editProfile") ?>"> Update Profile </a>
                </div>
            </div>

            <!-- <h2>Do Doctors code here</h2> -->
        <?php } else if ($type == 'user') { ?>
            <!-- echo "<pre>";
             print_r($user); -->

            <div class="container col-4 p-5 bg-light">

                <div class="card bg-light p-2" style="width: 100%; height: 100%;">
                    <div class="label h1 text-center p-4 bg-lgreen">Your Profile </div> <b>
                        <hr>
                    </b>
                    <h5 class="card-title"><b> Name: </b> <?= $user[0]['ufname'] . " " . $user[0]['ulname'] ?> </h5>
                    <h6 class="card-text"><b> Contact: </b> <?= $user[0]['ucontact'] ?></h6>
                    <!-- <h6 class="card-text"> <b>Email: </b> <? //= $user[0]['email'] 
                                                                ?></h6> -->
                                                                <h6 class="card-text"> <b> User type: </b>User</h6>
                    <h6 class="card-text "> <b> Email: </b> <?= $allUser[0]['email'] ?> </h6>
                    <h6 class="card-text"> <b> Age: </b> <?= $user[0]['uage'] ?></h6>
                    <h6 class="card-text"> <b> Gender: </b> <?= $user[0]['ugender'] ?></h6>
                    <h6 class="card-text"> <b> Blood Group: </b> <?= $user[0]['ubloodgroup'] ?></h6>
                    <h6 class="card-text"> <b> Address: </b> <?= $user[0]['uaddress'] ?></h6>
                    <a class="btn btn-danger btn-sm  mt-3" href="<?= base_url("/AllUserInfoController/changePassword") ?>"> Change Password </a>
                    <a class="btn btn-primary btn-sm mt-3 my-3" href="<?= base_url("/AllUserInfoController/editProfile") ?>"> Update Profile </a>
                </div>
            </div>
            <!-- <h2>Do Users code here</h2> -->
        <?php } else { ?>
            <!-- echo "<pre>";
            print_r($admin); -->

            <div class="container col-4 p-5 bg-light">

                <div class="card bg-light p-2" style="width: 100%; height: 100%;">
                    <div class="label h1 text-center p-4 bg-lgreen">Your Profile </div> <b>
                        <hr>
                    </b>
                    <h5 class="card-title"><b> Name: </b> <?= $admin[0]['fname'] . " " . $admin[0]['lname'] ?> </h5>
                    <h6 class="card-text"><b> Contact: </b> <?= $admin[0]['contact'] ?></h6>
                    <!-- <h6 class="card-text"> <b>Email: </b> <? //= $user[0]['email'] 
                                                                ?></h6> -->
                    <h6 class="card-text"> <b> User type: </b>Admin</h6>
                    <h6 class="card-text "> <b> Email: </b> <?= $allUser[0]['email'] ?> </h6>
                    <h6 class="card-text"> <b> Age: </b> <?= $admin[0]['age'] ?></h6>
                    <h6 class="card-text"> <b> Gender: </b> <?= $admin[0]['gender'] ?></h6>
                    <h6 class="card-text"> <b> Blood Group: </b> <?= $admin[0]['bloodgroup'] ?></h6>
                    <h6 class="card-text"> <b> Address: </b> <?= $admin[0]['address'] ?></h6>
                    <a class="btn btn-danger btn-sm  mt-3" href="<?= base_url("/AllUserInfoController/changePassword") ?>"> Change Password </a>
                    <a class="btn btn-primary btn-sm mt-3 my-3" href="<?= base_url("/AllUserInfoController/editProfile") ?>"> Update Profile </a>
                </div>
            </div>
            <!-- <h2>Do Admins code here</h2> -->
        <?php } ?>
        <!-- <a class="btn btn-danger btn-sm" href="<? //= base_url("/AllUserInfoController/changePassword") 
                                                    ?>"> Change Password </a>
        <a class="btn btn-primary btn-sm" href="<? //= base_url("/AllUserInfoController/editProfile") 
                                                ?>"> UpdateProfile </a> -->
    </div>

    <div class="footer footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>
</body>

</html>