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
    <title>Home</title>
</head>

<body>
    <div class="header fixed-height">
        <a href="<?= base_url("/Home") ?>" class="logo ms-5 mb-3">
            <img height="60" width="140" src="<?= base_url("/images/j1.png") ?>" alt="" class="rounded">
            <!--<label>DoctorLagbe</label>-->
        </a>
        <div class="header-right">
            <div class="row-5 float-right">
                <a class="active" href="<?= base_url("/Home") ?>">Home</a>
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
            <div class="search-container row clear-align">
                <form action="/AllUserInfoController/doctorInfoByCategory" method="POST">
                    <div class="col float-left text-bold me-2 mt-2">
                        <label for="">Choose filter </label>
                    </div>
                    <div class="col float-left mt-2">
                        <select name="expertise" id="expertise" class="form-control">
                            <option value="all" <?php if ($_SESSION['cat'] == "all") echo "selected"; ?>>Show all</option>
                            <option value="allergists" <?php if ($_SESSION['cat'] == "allergists") echo "selected"; ?>>Allergists</option>
                            <option value="dermatologists" <?php if ($_SESSION['cat'] == "dermatologists") echo "selected"; ?>>Dermatologists</option>
                            <option value="ophthalmologists" <?php if ($_SESSION['cat'] == "ophthalmologists") echo "selected"; ?>>Ophthalmologists</option>
                            <option value="gynecologists" <?php if ($_SESSION['cat'] == "gynecologists") echo "selected"; ?>>Gynecologists</option>
                            <option value="cardiologists" <?php if ($_SESSION['cat'] == "cardiologists") echo "selected"; ?>>Cardiologists</option>
                            <option value="endocrinologists" <?php if ($_SESSION['cat'] == "endocrinologists") echo "selected"; ?>>Endocrinologists</option>
                            <option value="gastroenterologists" <?php if ($_SESSION['cat'] == "gastroenterologists") echo "selected"; ?>>Gastroenterologists</option>
                            <option value="nephrologists" <?php if ($_SESSION['cat'] == "nephrologists") echo "selected"; ?>>Nephrologists</option>
                            <option value="neurologists" <?php if ($_SESSION['cat'] == "neurologists") echo "selected"; ?>>Neurologists</option>
                            <option value="psychiatrists" <?php if ($_SESSION['cat'] == "psychiatrists") echo "selected"; ?>>Psychiatrists</option>
                        </select>
                    </div>
                    <div class="col float-left">
                        <button type="submit"> <i class="fa fa-filter"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="container bg-dark p-4 mb-6">
        <?php
        $cnt = 3;
        foreach ($allDoc as $doc) {
            if ($cnt == 3) {
                $cnt = 0;
        ?>
                <div class="row h5 bg-light ps-3 py-3">
                <?php }
                ?>
                <div class="col">
                    <div class="card bg-light" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <h3 class="card-title"> <?= $doc['title'] . " " . $doc['dfname'] . " " . $doc['dlname'] ?> </h3>
                            <p class="card-text" style="font-size:18px;"> <?= "Designation  :  " . $doc['designation'] ?> </p>
                            <p class="card-text" style="font-size:18px;"> <?= "Qualification  :  " . $doc['qualification'] ?> </p>
                            <p class="card-text" style="font-size:18px;"> <?= "Expertise  :  " . $doc['expertise'] ?> </p>
                            <p class="card-text" style="font-size:18px;"> <?= "Organization  :  " . $doc['organization'] ?> </p>
                            <a href="http://localhost/DoctorLagbe/public/AllUserInfoController/doctorDetailsInfo? 
                                    &docid= <?php echo $doc["docid"] ?>" class="btn sign-btn">Details</a>
                        </div>
                    </div>
                </div>
                <?php
                if ($cnt == 2) { ?>
                </div>
        <?php
                }
                $cnt++;
            }
        ?>
    </div>
    <div class="footer footer-color pt-2">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>
</body>

</html>