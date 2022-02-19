<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;

class AppointmentController extends BaseController
{
    public function index()
    {
        session_start();
        $docid['docid'] = $this->request->getGet('docid');
        //print_r($docid);
        return view("createAppointmentView", $docid);
    }
    public function getHistory()
    {
        session_start();
        // $a=new AppointmentModel();
        // $appoinment['appointment']=$a->where('uid',$_SESSION['uid'])->findAll();
        $db = \Config\Database::connect();
        $build = $db->table('appointment');
        $build->select('*');
        $build->join('user', 'user.uid=appointment.uid');
        $build->join('doctor', 'doctor.docid=appointment.docid');
        //$build->join('review', 'review.appid=appointment.appid'); // code add by shafaet
        $build->where('appointment.uid', $_SESSION['uid']);
        $query = $build->get();
        $appoinment['appointment'] = $query->getResultArray();
        return view("appointmentHistoryView", $appoinment);
    }

    public function getAppointmentList()
    {
        session_start();
        $db = \Config\Database::connect();
        $build = $db->table('appointment');
        $build->select('*');
        $build->join('user', 'user.uid=appointment.uid');
        $build->join('doctor', 'doctor.docid=appointment.docid');
        $build->where('appointment.docid', $_SESSION['uid']);
        $query = $build->get();
        $appoinment['appointment'] = $query->getResultArray();
        // echo "<pre>";
        // print_r($appoinment);
        return view("appointmentListView",$appoinment);
    }

    public function saveAppointment($docid)
    {
        session_start();

        $pname = $this->request->getPost('pname');
        $page = $this->request->getPost('page');
        $pgender = $this->request->getPost('pgender');

        $pbg = $this->request->getPost('pbg');
        $date = $this->request->getPost('date');
        $appoinment = array(
            'docid' => $docid,
            'uid' => $_SESSION['uid'],
            'pname' => $pname,
            'page' => $page,
            'pgender' => $pgender,
            'pbg' => $pbg,
            'status' => "To be Served",
            'date' => $date,
        );
        echo "<pre>";
        print_r($appoinment);
        $ap = new AppointmentModel();
        $ap->insert($appoinment);
        return redirect()->to('/AppointmentController/getHistory');
    }
    public function updateStatus($appid){

        $status = $this->request->getPost('status');

        $data = array(
            'status' => $status
        );
        $ap = new AppointmentModel();
        $ap->update($appid, $data);
        return redirect()->to('/AppointmentController/getAppointmentList');
    }
}
