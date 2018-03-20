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
        $this->isLoggedIn();
    }
//    {
//        parent::__construct();
//        $this->load->model('profil_model');
////        $this->isLoggedIn();
//        $sessionArray = array('userId'=>3,
//            'role'=>4,
//            'id_mahasiswa'=>1,
//            'roleText'=>'Mahasiswa',
//            'isLoggedIn' => TRUE
//        );
//
//        $this->session->set_userdata($sessionArray);
//    }


//    function index()
//    {
//        $id_mhs = $this->session->userdata('id_mahasiswa');
//        $data['data_mhs'] = $this->profil_model->getProfilMhs($id_mhs);
//        $this->loadViews("profil",NULL, $data, NULL);
//    }
    function index()
    {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $id = $this->vendorId;
            $data['profilInfo'] = $this->profil_model->getProfilMhs($id);
            $this->loadViews("profil", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to edit the profil information
     */
    function editProfil()
    {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nim','NIM','trim|required|xss_clean');
            $this->form_validation->set_rules('nama','Nama Mahasiswa','trim|required|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('mobile','Keterangan','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                redirect('mahasiswa/profil');
            }
            else
            {
                $id_mahasiswa = $this->input->post('id_mahasiswa');
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $foto = $this->input->post('foto');
                $jumlah_sks = $this->input->post('jumlah_sks');
                $ipk = $this->input->post('ipk');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $skill = $this->input->post('skill');
                $pengalaman = $this->input->post('pengalaman');

                if($id_mahasiswa == '') {
                    $cekNim = $this->profil_model->cekNim($nim);

                    // Apabila NIM empty atau nim di tabel mahasiswa tidak ada yang memiliki
                    if (empty($cekNim)) {

                        $mahasiswaInfo = array('nim'=>$nim, 'nama'=>$nama, 'foto'=>$foto, 'jumlah_sks'=>$jumlah_sks, 'ipk'=>$ipk, 'email'=>$email, 'mobile'=>$mobile, 'skill'=>$skill, 'pengalaman'=>$pengalaman, 'createdDtm'=>date('Y-m-d H:i:s'));

                        $result = $this->profil_model->addNewMahasiswa($mahasiswaInfo);

                        if($result > 0)
                        {
                            $this->session->set_flashdata('success', 'Profil updated');
                        }
                        else
                        {
                            $this->session->set_flashdata('error', 'Profil update failed');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'NIM sudah ada yang memiliki');
                    }

                } else {

                    $cekNim = $this->profil_model->cekNim($nim);

                    // Apabila cekNim > 0 adalah nim di tabel mahasiswa sudah ada datanya
                    if ($cekNim > 0) {
                        // Nim tidak diedit
                        $mahasiswaInfo = array('nama'=>$nama, 'foto'=>$foto, 'jumlah_sks'=>$jumlah_sks, 'ipk'=>$ipk, 'email'=>$email, 'mobile'=>$mobile, 'skill'=>$skill, 'pengalaman'=>$pengalaman, 'createdDtm'=>date('Y-m-d H:i:s'));
                    }else{
                        $mahasiswaInfo = array('nim'=>$nim, 'nama'=>$nama, 'foto'=>$foto, 'jumlah_sks'=>$jumlah_sks, 'ipk'=>$ipk, 'email'=>$email, 'mobile'=>$mobile, 'skill'=>$skill, 'pengalaman'=>$pengalaman, 'createdDtm'=>date('Y-m-d H:i:s'));
                    }

                    $result = $this->profil_model->editProfil($mahasiswaInfo, $id_mahasiswa);

                    if($result == true)
                    {
                        $this->session->set_flashdata('success', 'Profil updated ');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Profil update failed');
                    }
                }

                redirect('mahasiswa/profil');
            }
        }
    }
}