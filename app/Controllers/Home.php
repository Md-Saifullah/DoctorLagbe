<?php

namespace App\Controllers;

use App\Controllers\AllUserInfoController;

class Home extends BaseController
{
    public function index()
    {  
        session_start();
        $_SESSION['cat']="all";
        $doc=new AllUserInfoController;       
        $data['allDoc']=$doc->getAllDoctorInfo();      
        return view('homeView',$data);
        //return view('scrapView',$data);    
    }      
}
