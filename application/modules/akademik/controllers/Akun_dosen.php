<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_dosen extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->user_model->getUserTable(ROLE_DOSEN);
        $data['role'] = ROLE_DOSEN;
        $this->global['pageTitle'] = "Elusi : Dashboard User Mahasiswa"; 
        $this->loadViews("dashboard_dosen",$this->global,$data);
    }

    public function add_form(){
        $data['role'] = ROLE_DOSEN;
        $this->global['pageTitle'] = "Elusi : Add New User"; 
        $this->loadViews("add_user",$this->global,$data);
    }

    public function edit_form($id){
        $data['role'] = ROLE_DOSEN;
        $data['dataUser'] = $this->user_model->getUser($id);
        $this->global['pageTitle'] = "Elusi : Edit User"; 
        $this->loadViews("edit_user",$this->global,$data);
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}