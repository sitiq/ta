<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:27
 * Description:
 */

class Sidang extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sidang_model');
        $this->isLoggedIn();
    }

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
            $data['idMahasiswa'] = $this->sidang_model->cekMahasiswa($userId);
            $this->loadViews("sidang", $this->global, $data, NULL);
        }
    }
    function daftar(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_mahasiswa','ID Mahasiswa','required|xss_clean');
        $this->form_validation->set_rules('id_sidang','ID Sidang','required|xss_clean');
        $this->form_validation->set_rules('id_validasi_sidang','ID Validasi','required|xss_clean');
        $this->form_validation->set_rules('id_berkas_sidang','ID Berkas','required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('mahasiswa/sidang');
        }else{
            $id_user = $this->vendorId;
            $cek = $this->sidang_model->cekMahasiswa($id_user);

            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_sidang = $this->input->post('id_sidang');
            $id_validasi_sidang = $this->input->post('id_validasi_sidang');
            $id_berkas_sidang = $this->input->post('id_berkas_sidang');

            $sidangId = array(
              "id_mahasiswa"=>$id_mahasiswa,
              "id_sidang"=>$id_sidang
            );
            $sidang = $this->sidang_model->addNewSidang($sidangId);

            $daftarId = array(
                "id_sidang"=>$sidang,
                "id_validasi_sidang"=>$id_validasi_sidang,
                "id_berkas_sidang"=>$id_berkas_sidang
            );
//            insert to sidang table
            $result = $this->sidang_model->addNewValidasi($daftarId);
//            lebih dari 0 berarti ada data yg masuk
            if ($result>0)
            {
                $this->sesion->set_flashdata('success','Sidang registered');
            }
            else
            {
                $this->session->set_flashdata('error','Sidang register failed');
            }
        }
        redirect('mahasiswa/sidang');
    }
    /**
     * This function is used to edit the photo information
     */
    function editBerkas () {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $id_folder = $this->input->post('id_berkas_sidang');
            $nim = $this->input->post('id_mahasiswa');
            $cekMhs = $this->profil_model->cekMahasiswa($nim);

            if (!$cekMhs)
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_valid_sidang','ID','required');
            $id_berkas = $this->input->post('id_valid_sidang');

            if ($id_folder==1){
                $config['upload_path'] = 'uploads/sidang/usulan-sidang';
                $new_name = "usulan-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==2){
                $config['upload_path'] = 'uploads/sidang/krs';
                $new_name = "krs-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==3){
                $config['upload_path'] = 'uploads/sidang/rekap-nilai';
                $new_name = "rekap-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==4){
                $config['upload_path'] = 'uploads/sidang/kartu-hasil-studi';
                $new_name = "khs-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==5){
                $config['upload_path'] = 'uploads/sidang/kartu-bimbingan';
                $new_name = "bimbingan-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==6){
                $config['upload_path'] = 'uploads/sidang/ktm';
                $new_name = "ktm-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==7){
                $config['upload_path'] = 'uploads/sidang/riwayat-registrasi';
                $new_name = "riwayat-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==8){
                $config['upload_path'] = 'uploads/sidang/proposal';
                $new_name = "proposal-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==9){
                $config['upload_path'] = 'uploads/sidang/laporan';
                $new_name = "laporan-".time();
                $config['file_name'] = $new_name;
            }elseif ($id_folder==10){
                $config['upload_path'] = 'uploads/sidang/cover';
                $new_name = "cover-".time();
                $config['file_name'] = $new_name;
            }else{
                $config['upload_path'] = 'uploads/sidang/tambahan-syarat';
                $new_name = "tambahan-".time();
                $config['file_name'] = $new_name;
            }
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 8000;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('path')){
                // bila uplod path error
                $error = array('error' => $this->upload->display_errors());
                // echo $error['error'];
                $this->session->set_flashdata('error', 'Upload file failed');
            }else{
                // bila upload path berhasil
                $terupload = $this->upload->data();
                $berkasInfo = array('path'=>$terupload['file_name'], 'isValid'=>1);

                $result = $this->sidang_model->editBerkas($berkasInfo, $id_berkas);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'File uploaded');
                }
                else
                {
                    $this->session->set_flashdata('error', 'File upload failed');
                }
            }
            redirect('mahasiswa/sidang');
        }
    }
}