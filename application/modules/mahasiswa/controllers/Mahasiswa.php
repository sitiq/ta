<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:35
 * Description:
 */

class Mahasiswa extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->isLoggedIn();
    }

    public function index(){
        $userId = $this->vendorId;

        $data['pesanInfo'] = $this->dashboard_model->getPesanList($userId);
        $data['revisiInfo'] = $this->dashboard_model->getRevisiSidang($userId);
        $this->global['pageTitle'] = "Elusi : Dashboard";
        $this->loadViews("dashboard",$this->global,$data);
    }
}