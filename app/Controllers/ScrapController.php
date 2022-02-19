<?php

namespace App\Controllers;

use PhpParser\Node\Expr\ArrayItem;
use App\Controllers\DoctorInfoController;

class Home extends BaseController
{
    public function index()
    {
        
        $doc=new DoctorInfoController;
        
        $data['allDoc']=$doc->getAllDoctorInfo();
        //echo "<pre>";
       // print_r($data);
        //return view('welcome_message');
        //return view('scrapView',$data);
        return view('scrapView',$data);
        //return view("docSignupView");
    }
    
}
