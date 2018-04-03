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
            $data['idBerkas'] = $this->yudisium_model->getIdBerkas();
            $data['totalSyarat'] = $this->yudisium_model->getCountBerkas();
            $data['idMahasiswa'] = $this->yudisium_model->cekMahasiswa($userId);

            $this->loadViews("yudisium", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to registration Yudisium
     */
    function daftar(){
        //get id user who is logged in
        $id_user = $this->vendorId;
        //get total syarat where active
        $total_syarat = $this->input->post('total_syarat');
//            get first id syarat berkas
        $id_syarat = $this->input->post('id_syarat');
//            get id_mahasiswa based on who is logged in
        $cek = $this->yudisium_model->cekMahasiswa($id_user);
        $id_mahasiswa = $cek[0]->id_mahasiswa;

        $infoYudisium = array(
            "id_mahasiswa"=>$id_mahasiswa,
            "id_periode"=>15
        );
        //            insert to table yudisium / registration yudisium new
        $idYudisium = $this->yudisium_model->addNewYudisium($infoYudisium);

//            insert to validasi yudisium table, 7 files important to yudisium
        for ($i=1;$i<=$total_syarat;$i++){
            $daftarId = array(
                "id_yudisium"=>$idYudisium,
                "id_berkas_yudisium"=>$id_syarat
            );
            $result = $this->yudisium_model->addNewValidasi($daftarId);
            $id_syarat++;
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
     * This function is used to edit files upload requirement files
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
            //            get total syarat
            $total_syarat = $this->input->post('total_syarat');
// upload files based on each folder in uploads folder
            for ($i=1;$i<=$total_syarat;$i++)
            {
                $config['upload_path'] = 'uploads/sidang/'.$id_folder;
                $new_name = "sidang-".$id_folder."-".time();
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
                $berkasInfo = array(
                    'path'=>$terupload['file_name'],
                    'isValid'=>1
                );

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
    /**
     * This function is used to load the 404 page not found
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}