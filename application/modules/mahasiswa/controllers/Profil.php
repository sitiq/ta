<?php
/**
 * Created by nad.
 * Date: 15/03/2018
 * Time: 14:59
 * Description:
 */

class Profil extends BaseController
{
//    function index() {
//        $this->loadViews("profil", NULL, NULL, NULL);
////        $this->load->view("profil");
//    }
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model');
//        $this->isLoggedIn();
        $sessionArray = array('userId'=>3,
            'role'=>4,
            'id_mahasiswa'=>1,
            'roleText'=>'Mahasiswa',
            'isLoggedIn' => TRUE
        );

        $this->session->set_userdata($sessionArray);
    }
    function index()
    {
        $id_mhs = $this->session->userdata('id_mahasiswa');
        $data['data_mhs'] = $this->profil_model->getProfilMhs($id_mhs);
        $this->loadViews("profil",NULL, $data, NULL);
    }
}