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
    <title>Doctor Informations</title>
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
                    <a class="" href="<?= base_url("/LoginController") ?>">Login</a>
                    <a class="me-2" href="<?= base_url("/SignupController/userSignup") ?>">Signup</a>
                <?php
                }
                ?>
            </div>
            
        </div>
    </div>
    <div class="row bg-light m-3 p-2" style="width: 100%; height: 100%;">
        <div class="label h4 text-center p-4 bg-lgreen">Doctor Informations </div> <b>
            <hr>
        </b>
        <div class="container bg-dark p-5 mb-6">
            <?php
            foreach ($doc as $doctor) {
                //echo "<pre>";
                //print_r($doc);
            ?>
                <div class="row h5 bg-light ps-3 py-3">
                <div class="col">
                    <div class="card bg-light" style="width: 100%; height: 100%;">
                        <div class="card-body">
                        <h5 class="card-title"><b> Name: </b> <?= $doctor['title'] . " " . $doctor['dfname'] . " " . $doctor['dlname'] ?> </h5>
                    <h6 class="card-text "> <b> Qualification: </b> <?= $doctor['qualification'] ?> </h6>
                    <h6 class="card-text "> <b> Designation: </b> <?= $doctor['designation'] ?> </h6>
                    <h6 class="card-text "> <b> Expertise: </b> <?= $doctor['expertise'] ?> </h6>
                    <h6 class="card-text "> <b> Organization: </b> <?= $doctor['organization'] ?> </h6>
                    <h6 class="card-text "> <b> chamber: </b> <?= $doctor['chamber'] ?> </h6>
                    <h6 class="card-text "> <b> Schedule: </b> <?= $doctor['schedule'] ?> </h6>
                    <h6 class="card-text "> <b> Address: </b> <?= $doctor['daddress'] ?> </h6>
                    <h6 class="card-text "> <b> Fees: </b> <?= $doctor['fees'] ?> </h6>
                        </div>
                    </div>
                </div>
                    <?php
                    if (isset($_SESSION['email'])) {
                        if ($_SESSION['type'] == "user") { ?>

                            <div class="col-2">
                                <a href="http://localhost:8080/AppointmentController/? &docid= <?php echo $doctor["docid"] ?>">
                                    <button> Appointment </button>
                                </a>
                            </div>
                        <?php }
                    } else { ?>

                        <div class="col-2">
                            <label style="color:red; font-size:15px">Please Login for <br> taking Appointment</label>
                        </div>

                    <?php } ?>

                </div>
                <br>
            <?php
            }

            ?>
        </div>
    </div>
    <label>
        <?php
        //echo "<pre>";
        // print_r($review);
        ?>
    </label>

    <div class="row bg-light m-3 p-2" style="width: 100%; height: 100%;">
        <div class="label h4 text-center p-4 bg-lgreen">Reviews </div> <b>
            <hr>
        </b>
        <div class="container bg-dark p-5 mb-6">
            <?php
            foreach ($review as $rev) {
            ?>
                <div class="row h5 bg-light ps-3 py-3">
                    <div class="col">
                        <?php
                        echo ($rev->details);
                        ?>
                    </div>

                </div>
                <br>
            <?php
            }

            ?>
        </div>
    </div>
    <div class="footer footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>
</body>

</html>