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
    <title>Manage User</title>
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
                        <a class="active me-2" href="<?= base_url("/AllUserInfoController") ?>">Manage User</a>
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

    <div class="mb-6">

        <h2 style="color:red; text-align:center"> Doctor List </h2>

        <table class="table table-striped">
            <thead class="table-dark">
                <th> Doctor No. </th>
                <th> Title </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Blood Group </th>
                <th> Age </th>
                <th> Qualification </th>
                <th> Designation </th>
                <th> Expertise </th>
                <th> Organization </th>
                <th> Chamber </th>
                <th> Schedule </th>
                <th> Address </th>
                <th> Contact </th>
                <th> Gender </th>
                <th> Fees </th>
                <th colspan="2" style="text-align:center"> Action </th>
            </thead>

            <?php

            $i = 1;
            foreach ($doctor as $d) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d->title ?></td>
                    <td><?= $d->dfname ?></td>
                    <td><?= $d->dlname ?></td>
                    <td><?= $d->dbloodgroup ?></td>
                    <td><?= $d->dage ?></td>
                    <td><?= $d->qualification ?></td>
                    <td><?= $d->designation ?></td>
                    <td><?= $d->expertise ?></td>
                    <td><?= $d->organization ?></td>
                    <td><?= $d->chamber ?></td>
                    <td><?= $d->schedule ?></td>
                    <td><?= $d->daddress ?></td>
                    <td><?= $d->dcontact ?></td>
                    <td><?= $d->dgender ?></td>
                    <td><?= $d->fees ?></td>
                    <td> <a class="btn btn-primary btn-sm" href="http://localhost:8080/AllUserInfoController/editDoctorInfo? &docid= <?php echo $d->docid ?>"> Update </a> </td>
                    <td> <a class="btn btn-danger btn-sm" href="http://localhost:8080/AllUserInfoController/deleteUser? &id= <?php echo $d->docid ?>"> Delete </a> </td>
                </tr>
            <?php $i++;
            } ?>
        </table>
        <h2 style="color:red; text-align:center"> User List </h2>
        <table class="table table-striped">
            <thead class="table-dark">
                <th> User No. </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Contact </th>
                <th> Gender </th>
                <th> Address </th>
                <th> Age </th>
                <th> Bloodgroup </th>
                <th colspan="2" style="text-align:center"> Action </th>
            </thead>
            <?php
            $i = 1;
            //echo "<b>User List</b><br><br>";
            foreach ($user as $u) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $u->ufname ?></td>
                    <td><?= $u->ulname ?></td>
                    <td><?= $u->ucontact ?></td>
                    <td><?= $u->ugender ?></td>
                    <td><?= $u->uaddress ?></td>
                    <td><?= $u->uage ?></td>
                    <td><?= $u->ubloodgroup ?></td>
                    <td> <a class="btn btn-primary btn-sm" href="http://localhost:8080/AllUserInfoController/editUserInfo? &uid= <?php echo $u->uid ?>"> Update </a> </td>
                    <td> <a class="btn btn-danger btn-sm" href="http://localhost:8080/AllUserInfoController/deleteUser? &id= <?php echo $u->uid ?>"> Delete </a> </td>
                </tr>
            <?php $i++;
            } ?>
        </table>

        <h2 style="color:red; text-align:center"> Admin List </h2>

        <table class="table table-striped">
            <thead class="table-dark">
                <th> Admin No. </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Contact </th>
                <th> Gender </th>
                <th> Address </th>
                <th> Age </th>
                <th> Bloodgroup </th>
                <th colspan="2" style="text-align:center"> Action </th>
            </thead>
            <?php
            $i = 1;
            //echo "<b>User List</b><br><br>";
            foreach ($admin as $a) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $a->fname ?></td>
                    <td><?= $a->lname ?></td>
                    <td><?= $a->contact ?></td>
                    <td><?= $a->gender ?></td>
                    <td><?= $a->address ?></td>
                    <td><?= $a->age ?></td>
                    <td><?= $a->bloodgroup ?></td>

                    <?php
                    if ($a->aid == $_SESSION['uid']) {;
                    ?>
                        <td> <a class="btn btn-primary btn-sm" href="http://localhost:8080/AllUserInfoController/editAdminInfo? &aid= <?php echo $a->aid ?>"> Update </a> </td>
                        <td> <a class="btn btn-danger btn-sm" href="http://localhost:8080/AllUserInfoController/deleteUser? &id= <?php echo $a->aid ?>"> Delete </a> </td>
                    <?php
                    }else{
                    ?>
                    <td colspan="2">You can not Update or Delete another Admin</td>
                    <?php
                    }
                    ?>
                </tr>
            <?php $i++;
            } ?>
        </table>
    </div>
    <div class=" footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>
</body>

</html>