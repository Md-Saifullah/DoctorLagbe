<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AllUserModel;
use App\Models\DoctorModel;
use App\Models\UserModel;
use App\Models\AdminModel;

class SignupController extends BaseController
{
    public function index()
    {
        
    }
    public function adminSignup()
    {
        session_start();
        return view("adminSignUpView");
    }
    function saveAdminSignup()
    {
        $admin = new AdminModel();
        $alluser = new AllUserModel();

        /* Collecting Data For User table & model */

        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $contact = $this->request->getPost('contact');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');
        $age = $this->request->getPost('age');
        $bloodgroup = $this->request->getPost('bloodgroup');

        /* Collecting Data For AllUser table & model */

        $email = $this->request->getPost('email');
        $password = md5("" . $this->request->getPost('password'));
        // $confirmPassword=$this->request->getPost('confirmPassword');

        /* Alluser data is inserted into Array */

        $alluserdata = array(
            'type' => 'admin',
            'email' => $email,
            'password' => $password
        );

        $alluser->insert($alluserdata); /* Insert the AllUser array in alluser database so can we get the id*/

        $aid = $alluser->where('email', $email)->findColumn('id'); /* Retrieve id from alluser database */

        /* User data is inserted into Array */

        $admindata = array(
            'aid' => $aid,
            'fname' => $fname,
            'lname' => $lname,
            'contact' => $contact,
            'gender' => $gender,
            'address' => $address,
            'age' => $age,
            'bloodgroup' => $bloodgroup
        );

        $admin->insert($admindata);   /* Insert the User array in user database */
        return redirect()->to('/Home');
        // echo "<pre>";
        // print_r($userdata);
        // print_r($alluserdata);

    }
    public function userSignup()
    {
        session_start();
        return view("userSignUpView");
    }
    function saveUserSignup()
    {
        $user = new UserModel();
        $alluser = new AllUserModel();

        /* Collecting Data For User table & model */

        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $contact = $this->request->getPost('contact');
        $gender = $this->request->getPost('gender');
        $address = $this->request->getPost('address');
        $age = $this->request->getPost('age');
        $bloodgroup = $this->request->getPost('bloodgroup');

        /* Collecting Data For AllUser table & model */

        $email = $this->request->getPost('email');
        $password = md5("" . $this->request->getPost('password'));
        // $confirmPassword=$this->request->getPost('confirmPassword');

        /* Alluser data is inserted into Array */

        $alluserdata = array(
            'type' => 'user',
            'email' => $email,
            'password' => $password
        );

        $alluser->insert($alluserdata); /* Insert the AllUser array in alluser database so can we get the id*/

        $uid = $alluser->where('email', $email)->findColumn('id'); /* Retrieve id from alluser database */

        /* User data is inserted into Array */

        $userdata = array(
            'uid' => $uid,
            'ufname' => $fname,
            'ulname' => $lname,
            'ucontact' => $contact,
            'ugender' => $gender,
            'uaddress' => $address,
            'uage' => $age,
            'ubloodgroup' => $bloodgroup
        );

        $user->insert($userdata);   /* Insert the User array in user database */
        return redirect()->to('/Home');
        // echo "<pre>";
        // print_r($userdata);
        // print_r($alluserdata);

    }


    function doctorSignup()
    {
        session_start();
        return view("doctorSignupView");
    }

    function saveDoctorSignup()
    {
        $doctor = new doctorModel();
        $alluser = new AllUserModel();

        /* Collecting Data For Doctor table & model */

        $title = $this->request->getPost("title");
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $qualification = $this->request->getPost("qualification");
        $expertise = $this->request->getPost("expertise");
        $gender = $this->request->getPost("gender");
        $bloodgroup = $this->request->getPost('bloodgroup');
        $contact = $this->request->getPost("contact");
        $email = $this->request->getPost('email');
        $age = $this->request->getPost('age');
        $designation = $this->request->getPost("designation");
        $organization = $this->request->getPost("organization");
        $address = $this->request->getPost("address");
        $schedule = $this->request->getPost("schedule");
        $chamber = $this->request->getPost("chamber");
        $fees = $this->request->getPost("fees");

        /* Collecting Data For AllUser table & model */

        $email = $this->request->getPost('email');
        $password = md5("" . $this->request->getPost('password'));
        //$confirmPassword=$this->request->getPost('confirmPassword');

        /* Alluser data is inserted into Array */

        $alluserdata = array(
            'type' => 'doctor',
            'email' => $email,
            'password' => $password
        );

        $alluser->insert($alluserdata); /* Insert the AllUser array in alluser database so can we get the id*/

        $docid = $alluser->where('email', $email)->findColumn('id'); /* Retrieve id from alluser database */

        /* Doctor data is inserted into Array */

        $doctordata = array(
            "docid" => $docid,
            "title" => $title,
            "dfname" => $fname,
            "dlname" => $lname,
            "qualification" => $qualification,
            "expertise" => $expertise,
            "dgender" => $gender,
            "dbloodgroup" => $bloodgroup,
            "dcontact" => $contact,
            "email" => $email,
            "dage" => $age,
            "designation" => $designation,
            "organization" => $organization,
            "daddress" => $address,
            "schedule" => $schedule,
            "chamber" => $chamber,
            "fees" => $fees
        );

        $doctor->insert($doctordata);   /* Insert the User array in user database */
        return redirect()->to('/Home');

        // echo "<pre>";
        // print_r($alluserdata);
        // print_r($doctordata);
    }
}
