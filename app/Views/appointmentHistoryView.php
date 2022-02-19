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
    <title>Appointment History</title>
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
                        <a class="active" href="<?= base_url("/AppointmentController/getHistory") ?>">Appointment History</a>
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

    <h2 style="color:red; text-align:center"> Appointment History </h2>
    <table class="table table-striped">
        <thead class="table-dark">
            <th> Appointment <br> Number</th>
            <th> Appointment ID</th>
            <th> Doctor Name</th>
            <th>User Name</th>
            <th>Patient Name</th>
            <th> Age</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Status</th>

            <th> Date </th>
            <th>Action</th>

        </thead>

        <?php
        $i = 1;
        foreach ($appointment as $a) { ?>
            <tr>
                <td style="text-align: center;"><?= $i ?></td>
                <td style="text-align: center;"><?= $a["appid"] ?></td>
                <td><?= $a["title"] . " " . $a["dfname"] . " " . $a["dlname"] ?></td>
                <td><?= $a["ufname"] . " " . $a["ulname"] ?></td>
                <td><?= $a["pname"] ?></td>
                <td><?= $a["page"] ?></td>
                <td><?= $a["pgender"] ?></td>
                <td><?= $a["pbg"] ?></td>
                <td><?= $a["status"] ?></td>
                <td><?= $a["date"] ?></td>
                <?php $i++;
                if ($a["status"] == "Served") {
                ?>
                    <td><a class="btn btn-primary btn-sm" href=<?= base_url('ReviewController/createReview/' . $a["appid"]) ?>>Review</a></td>
                <?php
                } else if ($a["status"] == "To be Served") {
                ?>
                    <td>You can Review after being served</td>
                <?php
                } else { ?>
                    <td>You Missed the appointment</td>
            <?php
                }
            }
            ?>
    </table>
    <div class="footer footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>
</body>

</html>