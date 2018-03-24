<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_mahasiswa extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->user_model->getUserTable(ROLE_MAHASISWA);
        $data['role'] = ROLE_MAHASISWA;
        $this->global['pageTitle'] = "Elusi : Dashboard User Mahasiswa"; 
        $this->loadViews("dashboard_mahasiswa",$this->global,$data);
    }

    public function add_form(){
        $data['role'] = ROLE_MAHASISWA;
        $this->global['pageTitle'] = "Elusi : Add New User"; 
        $this->loadViews("add_user",$this->global,$data);

    }

    public function edit_form($id){
        $data['role'] = ROLE_MAHASISWA;
        $data['dataUser'] = $this->user_model->getUser($id);
        $this->global['pageTitle'] = "Elusi : Edit User"; 
        $this->loadViews("edit_user",$this->global,$data);
    }
}