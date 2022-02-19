<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AllUserModel;

class LoginController extends BaseController
{
    public function index()
    {
        //return view("scrapView");
        //session_start();
        return view("loginView");
    }
    function checkLogin()
    {

        $alluser = new AllUserModel();


        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $users = $alluser->where('email', $email)->findAll(); // Get the user information
        $cnt = count($users);
        if ($cnt == 1) {
            if ($users[0]['password'] == md5("" . $password)) {
                echo "Login Successful";
                session_start();
                $_SESSION["uid"]=$users[0]['id'];
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION['type']=$users[0]['type'];
                //return view("scrapView");
                return redirect()->to(base_url("/Home"));
            } else {
                echo "Incorrect Password";
                return redirect()->to(base_url("/LoginController"))->with('status', 'Incorrect Email or Password!');
            }
        } else {
            echo "Incorrect Email";
            echo "<br>";
            return redirect()->to(base_url("/LoginController"))->with('status', 'Incorrect Email or Password!');
        }



        //return view("scrapView");
    }
}


//$getemail = $alluser->where('email',$email)->findColumn("email");
        //echo $getemail[0];
        //echo count($getemail);


// echo("CheckLogin");
        // $email=$this->request->getPost("email");
        // $password=md5("".$this->request->getPost("password")) ;

        // $data=array(
        //     "email" => $email,
        //     "password" => $password
        // );

        // echo"<pre>";
        // print_r($data);

        //  echo($email." ".$password);
        //  return view("scrapView");
