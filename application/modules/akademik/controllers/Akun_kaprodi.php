<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_kaprodi extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->user_model->getUserTable(ROLE_KAPRODI);
        $data['role'] = ROLE_KAPRODI;
        $this->global['pageTitle'] = "Elusi : Dashboard User Mahasiswa"; 
        $this->loadViews("dashboard_kaprodi",$this->global,$data);
    }

    public function add_form(){
        $data['role'] = ROLE_KAPRODI;
        $this->global['pageTitle'] = "Elusi : Add New User"; 
        $this->loadViews("add_user",$this->global,$data);
    }

    public function edit_form($id){
        $data['role'] = ROLE_KAPRODI;
        $data['dataUser'] = $this->user_model->getUser($id);
        $this->global['pageTitle'] = "Elusi : Edit User"; 
        $this->loadViews("edit_user",$this->global,$data);
    }
}