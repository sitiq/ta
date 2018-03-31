<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:28
 * Description:
 */

class Yudisium extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('yudisium_model');
        $this->isLoggedIn();
    }
    /**
     * This function is used to load main page
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
            $this->global['pageTitle'] = "Elusi : Yudisium";

            $data['berkasInfo'] = $this->yudisium_model->getBerkasInfo($userId);
            $data['periodeInfo'] = $this->yudisium_model->getPeriode();
            $this->loadViews("yudisium", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to registration Yudisium
     */
    function daftar(){
        $id_user = $this->vendorId;

        $cek = $this->yudisium_model->cekMahasiswa($id_user);
        $id_mahasiswa = $cek[0]->id_mahasiswa;

        $infoYudisium = array(
            "id_mahasiswa"=>$id_mahasiswa,
            "id_periode"=>2
        );
        $idYudisium = $this->yudisium_model->addNewYudisium($infoYudisium);

//            insert to validasi yudisium table, 7 files important to yudisium
        $idBerkas = 1;
        for ($i=1;$i<=7;$i++){
            $daftarId = array(
                "id_yudisium"=>$idYudisium,
                "id_berkas_yudisium"=>$idBerkas
            );
            $result = $this->yudisium_model->addNewValidasi($daftarId);
            $idBerkas++;
        }
//            lebih dari 0 berarti ada data yg masuk
        if ($result>0)
        {
            $this->session->set_flashdata('success','Yudisium registered');
        }
        else
        {
            $this->session->set_flashdata('error','Yudisium register failed');
        }

        redirect('mahasiswa/yudisium');
    }
    /**
     * This function is used to edit files for Yudisium
     */
    function editBerkas () {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $id_folder = $this->input->post('id_berkas_yudisium');
            $nim = $this->input->post('id_mahasiswa');
            $cekMhs = $this->yudisium_model->cekMahasiswa($nim);

            if (!$cekMhs)
                $this->load->library('form_validation');
            $this->form_validation->set_rules('id_valid_yudisium','ID','required');
            $id_berkas = $this->input->post('id_valid_yudisium');
// upload files based on each folder in uploads folder
            if ($id_folder==1){
                $config['upload_path'] = 'uploads/yudisium/permohonan';
                $new_name = "permohonan-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==2){
                $config['upload_path'] = 'uploads/yudisium/berita-acara';
                $new_name = "beritaacara-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==3){
                $config['upload_path'] = 'uploads/yudisium/surat-tanda-terima';
                $new_name = "suratterima-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==4){
                $config['upload_path'] = 'uploads/yudisium/poster';
                $new_name = "poster-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==5){
                $config['upload_path'] = 'uploads/yudisium/laporan-final';
                $new_name = "laporanfinal-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==6){
                $config['upload_path'] = 'uploads/yudisium/ijazah';
                $new_name = "ijazah-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==7){
                $config['upload_path'] = 'uploads/yudisium/sertifikat';
                $new_name = "sertifikat-".time();
                $config['file_name'] = $new_name;
            }else{
                $config['upload_path'] = 'uploads/yudisium/tambahan-syarat';
                $new_name = "tambahan-".time();
                $config['file_name'] = $new_name;
            }
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 8000;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('path')){
                // if upload path error
                $error = array('error' => $this->upload->display_errors());
                // echo $error['error'];
                $this->session->set_flashdata('error', 'Upload file failed');
            }else{
                // if upload path success
                $terupload = $this->upload->data();
                $berkasInfo = array('path'=>$terupload['file_name'], 'isValid'=>1);

                $result = $this->yudisium_model->editBerkas($berkasInfo, $id_berkas);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'File uploaded');
                }
                else
                {
                    $this->session->set_flashdata('error', 'File upload failed');
                }
            }
            redirect('mahasiswa/yudisium');
        }
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}