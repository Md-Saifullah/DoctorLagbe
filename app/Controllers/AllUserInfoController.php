<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\ReviewController;
use App\Models\UserModel;
use App\Models\DoctorModel;
use App\Models\AllUserModel;
use App\Models\AdminModel;

class AllUserInfoController extends BaseController
{
    public function index()
    {
        session_start();
        $db = \Config\Database::connect();

        $user = $db->table('alluser');
        $user->select('*');
        $user->join('user', 'user.uid=alluser.id');
        $queryu = $user->get();
        $allUser['user'] = $queryu->getResult();

        $doctor = $db->table('alluser');
        $doctor->select('*');
        $doctor->join('doctor', 'doctor.docid=alluser.id');
        $queryd = $doctor->get();
        $allUser['doctor'] = $queryd->getResult();

        $admin = $db->table('alluser');
        $admin->select('*');
        $admin->join('admin', 'admin.aid=alluser.id');
        $querya = $admin->get();
        $allUser['admin'] = $querya->getResult();
        return view('allUserInfoView', $allUser);
    }

    public function getAllDoctorInfo()
    {
        $docModel = new DoctorModel();
        $allDoctor = $docModel->findAll();
        return $allDoctor;
    }
    public function doctorInfoByCategory()
    {
        $doc = new DoctorModel();
        $docCategory = $this->request->getPost('expertise');
        if ($docCategory == "all")
            return redirect()->to("/Home");
        $docInfo['allDoc'] = $doc->where('expertise', $docCategory)->findAll();

        session_start();
        $_SESSION['cat'] = $docCategory;
        return view("homeView", $docInfo);
        //return view("scrapView", $docInfo);
    }

    public function doctorDetailsInfo()
    {
        session_start();
        $review=new ReviewController;
        $docid = $this->request->getGet('docid');
        $docInfo['doc'] = $this->getDocProfile($docid);
        $docInfo['review']=$review->getReviewDoc($docid);
        // echo "<pre>";
        // print_r($docInfo);
        return view("doctorInfoView", $docInfo);
    }
    public function getDocProfile($id)
    {
        $doc = new DoctorModel();
        return $doc->where('docid', $id)->findAll();
    }
    public function getUserProfile($id)
    {
        $user = new UserModel();
        return $user->where('uid', $id)->findAll();
    }
    public function getAdminProfile($id)
    {
        $admin = new AdminModel();
        return $admin->where('aid', $id)->findAll();
    }
    public function getAllUserData($id)
    {
        $allUser=new AllUserModel();
        return $allUser->where('id',$id)->findAll();
    }
    public function showProfile()
    {
        session_start();

        $type = $_SESSION['type'];
        $id = $_SESSION['uid'];
        if ($type === "doctor") {
            $profile['doctor'] = $this->getDocProfile($id);
        } else if ($type === "user") {
            $profile['user'] = $this->getUserProfile($id);
        } else {
            $profile['admin'] = $this->getAdminProfile($id);
        }
        $profile['allUser']=$this->getAllUserData($id);
        return view("profileView", $profile);
    }

    public function editProfile()
    {
        session_start();
        $type = $_SESSION['type'];
        $id = $_SESSION['uid'];
        if ($type === "doctor") {
            $docInfo['doctor'] = $this->getDocProfile($id);
            return view("doctorUpdateView", $docInfo);
        } else if ($type === "user") {
            $userInfo['user'] = $this->getUserProfile($id);
            return view("userUpdateView", $userInfo);
        } else {
            $adminInfo['admin'] = $this->getAdminProfile($id);
            return view("adminUpdateView", $adminInfo);
        }
    }
    public function editUserInfo()
    {
        session_start();
        $uid = $this->request->getGet('uid');
        $userInfo['user'] = $this->getUserProfile($uid);
        return view("userUpdateView", $userInfo);
    }
    public function updateUserInfo($uid)
    {
        $ufname = $this->request->getPost('ufname');
        $ulname = $this->request->getPost('ulname');
        $ucontact = $this->request->getPost('ucontact');
        $uaddress = $this->request->getPost('uaddress');
        $uage = $this->request->getPost('uage');
        $ubloodgroup = $this->request->getPost('ubloodgroup');
        $ugender = $this->request->getPost('ugender');

        $data = array(
            'ufname' => $ufname,
            'ulname' => $ulname,
            'ucontact' => $ucontact,
            'uaddress' => $uaddress,
            'uage' => $uage,
            'ubloodgroup' => $ubloodgroup,
            'ugender' => $ugender
        );

        $user = new UserModel();

        $user->update($uid, $data);
        session_start();
        if ($_SESSION['type'] == 'user') {
            return redirect()->to(base_url("/AllUserInfoController/showProfile"));
        } else {
            return redirect()->to(base_url('/AllUserInfoController'));
        }
    }
    public function editDoctorInfo()
    {
        session_start();
        $docid = $this->request->getGet('docid');
        $docInfo['doctor'] = $this->getDocProfile($docid);
        return view("doctorUpdateView", $docInfo);
    }
    public function updateDoctorInfo($docid)
    {
        $title = $this->request->getPost('title');
        $dfname = $this->request->getPost('dfname');
        $dlname = $this->request->getPost('dlname');
        $qualification = $this->request->getPost('qualification');
        $expertise = $this->request->getPost('expertise');
        $dgender = $this->request->getPost('dgender');
        $dbloodgroup = $this->request->getPost('dbloodgroup');
        $dcontact = $this->request->getPost('dcontact');
        $dage = $this->request->getPost('dage');
        $designation = $this->request->getPost('designation');
        $organization = $this->request->getPost('organization');
        $daddress = $this->request->getPost('daddress');
        $schedule = $this->request->getPost('schedule');
        $chamber = $this->request->getPost('chamber');
        $fees = $this->request->getPost('fees');

        $data = array(
            'title' => $title,
            'dfname' => $dfname,
            'dlname' => $dlname,
            'qualification' => $qualification,
            'expertise' => $expertise,
            'dgender' => $dgender,
            'dbloodgroup' => $dbloodgroup,
            'dcontact' => $dcontact,
            'dage' => $dage,
            'designation' => $designation,
            'organization' => $organization,
            'daddress' => $daddress,
            'schedule' => $schedule,
            'chamber' => $chamber,
            'fees' => $fees
        );

        $doctor = new DoctorModel();
        session_start();
        $doctor->update($docid, $data);
        if ($_SESSION['type'] == 'doctor') {
            return redirect()->to(base_url("/AllUserInfoController/showProfile"));
        } else {
            return redirect()->to(base_url('/AllUserInfoController'));
        }
    }
    public function editAdminInfo()
    {
        session_start();
        $aid = $this->request->getGet('aid');
        $adminInfo['admin'] = $this->getAdminProfile($aid);
        return view("adminUpdateView", $adminInfo);
    }
    public function updateAdminInfo($aid)
    {
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $contact = $this->request->getPost('contact');
        $address = $this->request->getPost('address');
        $age = $this->request->getPost('age');
        $bloodgroup = $this->request->getPost('bloodgroup');
        $gender = $this->request->getPost('gender');

        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'contact' => $contact,
            'address' => $address,
            'age' => $age,
            'bloodgroup' => $bloodgroup,
            'gender' => $gender
        );

        $user = new AdminModel();

        $user->update($aid, $data);
        return redirect()->to(base_url('/AllUserInfoController/showProfile'));
    }
    public function deleteUser()
    {
        $alluser = new AllUserModel();
        $id = $this->request->getGet('id');
        $alluser->delete($id);
        return redirect()->to(base_url('/AllUserInfoController'));
    }

    public function changePassword()
    {
        session_start();
        return view("changePasswordView");
    }

    public function saveChangePassword()
    {
        session_start();
        $oldPassword = $this->request->getPost('oldPassword');
        $newPassword = $this->request->getPost('newPassword');
        $confirmNewPassword = $this->request->getPost('confirmNewPassword');
        if (!($confirmNewPassword == $newPassword)) {
            $_SESSION['status'] = "Confirm Password did not matched";
        } else if ($_SESSION['password'] == $oldPassword) {
            $allUserModel = new AllUserModel();
            $data = array('password' => md5("" . $newPassword));
            $allUserModel->update($_SESSION['uid'], $data);
            $_SESSION['status'] = "Password changed Successfully";
        } else {
            $_SESSION['status'] = "Wrong Password";
        }
        return redirect()->to(base_url('/AllUserInfoController/changePassword'));
    }
}
