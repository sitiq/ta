<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:27
 * Description:
 */

class Sidang extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sidang_model');
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
            $data['berkasInfo'] = $this->sidang_model->getBerkasInfo($userId);
            $data['idBerkas'] = $this->sidang_model->getIdBerkas();
            $data['idPeriode'] = $this->sidang_model->getIdPeriode();
            $data['totalSyarat'] = $this->sidang_model->getCountBerkas();
            $data['ta'] = $this->sidang_model->getTa($userId);

            $data['idMahasiswa'] = $this->sidang_model->cekMahasiswa($userId);

            $this->global['pageTitle'] = "Elusi : Sidang";

            $this->loadViews("sidang", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to registration Sidang
     */
    function daftar(){
            //get id user who is logged in
            $id_user = $this->vendorId;
            //get total syarat where active
            $total_syarat = $this->input->post('total_syarat');
//            get id_periode
            $id_periode = $this->input->post('id_periode');
//            get first id syarat berkas
            $id_syarat = $this->input->post('id_syarat');
//            get id_mahasiswa based on who is logged in
            $cek = $this->sidang_model->cekMahasiswa($id_user);
            $id_mahasiswa = $cek[0]->id_mahasiswa;
            $infoSidang = array("id_mahasiswa"=>$id_mahasiswa,"id_periode"=>$id_periode);
//            insert to table sidang / registration sidang new
            $idSidang = $this->sidang_model->addNewSidang($infoSidang);
//            insert to validasi_berkas_sidang table, make 10 files important to Sidang
            for ($i=1;$i<=$total_syarat;$i++){
                $daftarId = array(
                    "id_sidang"=>$idSidang,
                    "id_berkas_sidang"=>$id_syarat
                );
                $result = $this->sidang_model->addNewValidasi($daftarId);
                $id_syarat++;
            }
//            lebih dari 0 berarti ada data yg masuk
            if ($result>0)
            {
                $this->session->set_flashdata('success','Daftar sidang berhasil!');
            }
            else
            {
                $this->session->set_flashdata('error','Daftar sidang gagal!');
            }

        redirect('mahasiswa/sidang');
    }

    function daftarUlang(){
        //get id user who is logged in
        $id_user = $this->vendorId;
//        get id_sidang_lama
        $id_sidang_lama = $this->input->post('id_sidang_lama');
//            get id_periode
        $id_periode = $this->input->post('id_periode');
//            get id_mahasiswa based on who is logged in
        $cek = $this->sidang_model->cekMahasiswa($id_user);
        $id_mahasiswa = $cek[0]->id_mahasiswa;
        $infoSidang = array(
            "id_mahasiswa"=>$id_mahasiswa,
            "id_periode"=>$id_periode,
        );
//            insert to table sidang / registration sidang new
        $idSidang = $this->sidang_model->addNewSidang($infoSidang);
        $berkasInfo = array(
            "id_sidang"=>$idSidang
        );
        $result = $this->sidang_model->editBerkasSidang($berkasInfo, $id_sidang_lama);

//            lebih dari 0 berarti ada data yg masuk
        if ($result>0)
        {$this->session->set_flashdata('success','Daftar ulang sidang berhasil!');}
        else{$this->session->set_flashdata('error','Daftar ulang sidang gagal!');}
        redirect('mahasiswa/sidang');
    }
    /**
     * This function is used to edit files upload requirement files
     */
    function editBerkas () {
        if($this->isMahasiswa() == TRUE)
        {$this->loadThis();}
        else
        {
//            get id berkas where to edit by folder
            $id_folder = $this->input->post('id_berkas_sidang');
            $nim = $this->input->post('id_mahasiswa');
            $cekMhs = $this->sidang_model->cekMahasiswa($nim);
            if (!$cekMhs)
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_valid_sidang','ID','required');
            $id_berkas = $this->input->post('id_valid_sidang');
//            get total syarat
            $total_syarat = $this->input->post('total_syarat');
//          upload based on each folders
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
                // if upload path not match
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Berkas tidak sesuai ketentuan');
            }else{
                // if upload success
                $terupload = $this->upload->data();
                $berkasInfo = array(
                    'path'=>$terupload['file_name'],
                    'isValid'=>1
                );
                $result = $this->sidang_model->editBerkas($berkasInfo, $id_berkas);
                if($result == true){
                    $this->session->set_flashdata('success', 'Berkas berhasil diunggah');
                }else{
                    $this->session->set_flashdata('error', 'Berkas gagal diunggah');
                }
            }
            redirect('mahasiswa/sidang');
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