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
    <title>Update Doctor Information</title>
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

    <div class="container mb-6">
        <div class="col-10 px-7 ms-6 pb-8 my-2 bg-light">
        <div class="label h4 text-center  p-4 bg-lgreen">Update Informations </div> <b>
            <hr>
        </b>
                <form name="form" onsubmit="return check()" action="<?= base_url("/AllUserInfoController/updateDoctorInfo/" . $doctor[0]['docid']) ?>" class="form-group" method="POST">

                    <div class="row pt-5">
                        <div class="col-3 text-bold ">
                            <label class="form-label ">Name</label>
                        </div>

                        <div class="col-1 for-colon ">
                            <label class="form-label ">:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="title" value="<?= $doctor[0]['title'] ?>" placeholder="Title">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="dfname" value="<?= $doctor[0]['dfname'] ?>" placeholder="first name">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="dlname" value="<?= $doctor[0]['dlname'] ?>" placeholder="last name">

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
                            <input name="qualification" class="form-control" value="<?= $doctor[0]['qualification'] ?>">
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
                                <option value="allergists" <?php if ($doctor[0]['expertise'] == "allergists")
                                                                echo "selected";
                                                            ?>>Allergists</option>
                                <option value="dermatologists" <?php if ($doctor[0]['expertise'] == "dermatologists")
                                                                    echo "selected";
                                                                ?>>Dermatologists</option>
                                <option value="ophthalmologists" <?php if ($doctor[0]['expertise'] == "ophthalmologists")
                                                                        echo "selected";
                                                                    ?>>Ophthalmologists</option>
                                <option value="gynecologists" <?php if ($doctor[0]['expertise'] == "gynecologists")
                                                                    echo "selected";
                                                                ?>>Gynecologists</option>
                                <option value="cardiologists" <?php if ($doctor[0]['expertise'] == "cardiologists")
                                                                    echo "selected";
                                                                ?>>Cardiologists</option>
                                <option value="endocrinologists" <?php if ($doctor[0]['expertise'] == "endocrinologists")
                                                                        echo "selected";
                                                                    ?>>Endocrinologists</option>
                                <option value="gastroenterologists" <?php if ($doctor[0]['expertise'] == "gastroenterologists")
                                                                        echo "selected";
                                                                    ?>>Gastroenterologists</option>
                                <option value="nephrologists" <?php if ($doctor[0]['expertise'] == "nephrologists")
                                                                    echo "selected";
                                                                ?>>Nephrologists</option>
                                <option value="neurologists" <?php if ($doctor[0]['expertise'] == "neurologists")
                                                                    echo "selected";
                                                                ?>>Neurologists</option>
                                <option value="psychiatrists" <?php if ($doctor[0]['expertise'] == "psychiatrists")
                                                                    echo "selected";
                                                                ?>>Psychiatrists</option>
                            </select>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-3 text-bold">
                            <label class="form-label">Gender</label>
                        </div>

                        <div class="col-1 for-colon">
                            <label class="form-label">:</label>
                        </div>
                        <div class="col">
                            <div class="form-check form-check-inline ms-2 mt-2">
                                <input type="radio" name="dgender" value="Male" class="form-check-input" <?php if ($doctor[0]['dgender'] == "Male") echo "checked"; ?> /> Male
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="dgender" value="Female" class="form-check-input" <?php if ($doctor[0]['dgender'] == "Female") echo "checked"; ?> /> Female
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="dgender" value="Others" class="form-check-input" <?php if ($doctor[0]['dgender'] == "Others") echo "checked"; ?> /> Others
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
                            <select name="dbloodgroup" id="bloodgroup" class="form-control">
                                <option value="A+" <?php if ($doctor[0]['dbloodgroup'] == "A+")
                                                        echo "selected";
                                                    ?>>A+</option>
                                <option value="A-" <?php if ($doctor[0]['dbloodgroup'] == "A-")
                                                        echo "selected";
                                                    ?>>A-</option>
                                <option value="B+" <?php if ($doctor[0]['dbloodgroup'] == "B+")
                                                        echo "selected";
                                                    ?>>B+</option>
                                <option value="B-" <?php if ($doctor[0]['dbloodgroup'] == "B-")
                                                        echo "selected";
                                                    ?>>B-</option>
                                <option value="AB+" <?php if ($doctor[0]['dbloodgroup'] == "AB+")
                                                        echo "selected";
                                                    ?>>AB+</option>
                                <option value="AB-" <?php if ($doctor[0]['dbloodgroup'] == "AB-")
                                                        echo "selected";
                                                    ?>>AB-</option>
                                <option value="O+" <?php if ($doctor[0]['dbloodgroup'] == "O+")
                                                        echo "selected";
                                                    ?>>O+</option>
                                <option value="O-" <?php if ($doctor[0]['dbloodgroup'] == "O-")
                                                        echo "selected";
                                                    ?>>O-</option>
                            </select>

                        </div>
                    </div>


                    <div class="row pt-2">
                        <div class="col-3 text-bold">
                            <label class="form-label">Contact No.</label>
                        </div>
                        <div class="col-1 for-colon">
                            <label class="form-label ">:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="dcontact" value="<?= $doctor[0]['dcontact'] ?>" placeholder="Contact No.">
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
                            <input type="number" class="form-control" name="dage" value="<?= $doctor[0]['dage'] ?>" placeholder="Enter Age">
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
                            <input type="text" class="form-control" name="designation" value="<?= $doctor[0]['designation'] ?>" placeholder="Enter Dessignation">
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
                            <input type="text" class="form-control" name="organization" value="<?= $doctor[0]['organization'] ?>" placeholder="Enter Organization">
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
                            <input type="text" class="form-control" name="schedule" value="<?= $doctor[0]['schedule'] ?>" placeholder="Enter Schedule">
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
                            <input type="text" class="form-control" name="chamber" value="<?= $doctor[0]['chamber'] ?>" placeholder="Enter Chamber">
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
                            <input type="text" class="form-control" name="daddress" value="<?= $doctor[0]['daddress'] ?>" placeholder="Enter Address">
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
                            <input type="number" class="form-control" name="fees" value="<?= $doctor[0]['fees'] ?>" placeholder="Enter Fees">
                        </div>
                    </div>
                    <div class="col-2 float-right mb-5 mt-3 me-5">
                        <input type="submit" value="Update" class="py-2 for-colon form-control sign-btn">

                    </div>
                </form>
        </div>
    </div>


    <div class="footer footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>

    <script>
        function check() {
            var title = document.form.title.value;
            var fname = document.form.dfname.value;
            var lname = document.form.dlname.value;
            var qualification = document.form.qualification.value;
            var expertise = document.form.expertise.value;
            var gender = document.form.dgender.value;
            var bloodgroup = document.form.dbloodgroup.value;
            var contact = document.form.dcontact.value;
            // var email = document.form.email.value;
            // var password = document.form.password.value;
            var age = document.form.dage.value;
            var designation = document.form.designation.value;
            var organization = document.form.organization.value;
            var address = document.form.daddress.value;
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
            // if (email == "") {
            //     alert("Email field can not be empty");
            //     return false;
            // }
            // if (password == "") {
            //     alert("Password field can not be empty");
            //     return false;
            // }
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