<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Profil extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model');
        $this->isLoggedIn();
    }

    /**
     * This function is used to load the profil list
     */
    function index()
    {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $userRole = $this->role;

            $data['profilInfo'] = $this->profil_model->getMahasiswa($userId);
            $data['userId'] = $userId;
            $data['userRole'] = $userRole;


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
            $this->form_validation->set_rules('mobile','Mobile','trim|required|xss_clean');

            if($this->form_validation->run() != FALSE)
            {
                $this->session->set_flashdata('success', 'lele');
                redirect('mahasiswa/profil');
            }
            else
            {
                $id_mahasiswa = $this->input->post('id_mahasiswa');
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $jumlah_sks = $this->input->post('jumlah_sks');
                $ipk = $this->input->post('ipk');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $skill = $this->input->post('skill');
                $pengalaman = $this->input->post('pengalaman');

				$cekNim = $this->profil_model->cekNim($id_mahasiswa);

                // Apabila NIM empty atau nim di tabel mahasiswa tidak ada yang memiliki
                if (empty($cekNim)) {
                    $mahasiswaInfo = array(
                        'nim'=>$nim,
                        'nama'=>$nama,
                        'jumlah_sks'=>$jumlah_sks,
                        'ipk'=>$ipk,
                        'email'=>$email,
                        'mobile'=>$mobile,
                        'skill'=>$skill,
                        'pengalaman'=>$pengalaman,
                        'createdDtm'=>date('Y-m-d H:i:s'));

                    $result = $this->profil_model->editProfil($mahasiswaInfo, $id_mahasiswa);

                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Profil created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Profil creation failed');
                    }
                } else {
                    $this->session->set_flashdata('error', 'NIM sudah ada');
                }
                redirect('mahasiswa/profil');
            }
        }
    }
    /**
     * This function is used to edit the photo information
     */
    function editPhoto () {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_mahasiswa','ID','required');

            $id_mahasiswa = $this->input->post('id_mahasiswa');

            $config['upload_path'] = 'uploads/foto/mahasiswa';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 4000;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto')){
                // if upload foto tidak sesuai
                $error = array('error' => $this->upload->display_errors());
                // echo $error['error'];
                $this->session->set_flashdata('error', 'Upload photo failed');
            }else{
                // bila upload foto berhasil
                $terupload = $this->upload->data();
                $mahasiswaInfo = array('foto'=>$terupload['file_name'], 'updatedDtm'=>date('Y-m-d H:i:s'));

                $result = $this->profil_model->editProfil($mahasiswaInfo, $id_mahasiswa);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Photo updated');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Photo update failed');
                }
            }
            redirect('mahasiswa/profil');
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Komsi : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>
