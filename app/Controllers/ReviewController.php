<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReviewModel;

class ReviewController extends BaseController
{
    public function index()
    {
        //
    }
    public function createReview($appid)
    {
        session_start();
        $data['appid'] = $appid;
        $reviewM = new ReviewModel();
        $temp = $reviewM->where('appid', $appid)->findAll();
        if ((count($temp)) == 1) {
            $data['review']=$temp;
            $data['cnt'] = 1;
        } else {
            $data['cnt'] = 0;
        }
        // echo"<pre>";
        // print_r($data);
         return view("reviewView", $data);
    }
    public function saveReview()
    {
        $appid = $this->request->getPost('appid');
        $dateandtime = $this->request->getPost('dateandtime');
        $details = $this->request->getPost('details');
        $data = array(
            'appid' => $appid,
            'dateandtime' => $dateandtime,
            'details' => $details
        );

        //echo $dateandtime;

        $reviewModel = new ReviewModel();
        $reviewModel->insert($data);

        return redirect()->to(base_url('/AppointmentController/getHistory'));
    }
    public function updateReview()
    {
        $reviewid = $this->request->getPost('reviewid');
        $dateandtime = $this->request->getPost('dateandtime');
        $details = $this->request->getPost('details');
        $data = array(
            'dateandtime' => $dateandtime,
            'details' => $details
        );

        //echo $dateandtime;

        $reviewModel = new ReviewModel();
        $reviewModel->update($reviewid, $data);

        return redirect()->to(base_url('/AppointmentController/getHistory'));
    }
    public function getReviewDoc($docid)
    {
        $db = \Config\Database::connect();

        $review = $db->table('appointment');
        $review->select('*');
        $review->join('review', 'review.appid=appointment.appid');
        $review->where('docid', $docid);
        $query = $review->get();
        return $query->getResult();
    }
}
