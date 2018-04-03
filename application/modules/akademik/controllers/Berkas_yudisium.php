<?php
/**
 * Created by nad.
 * Date: 02/04/2018
 * Time: 19:15
 * Description:
 */

class Berkas_yudisium extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('berkas_model');
        $this->isLoggedIn();
    }

    public function index(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $data['dataTable'] = $this->berkas_model->getBerkasYudisium();
            $this->global['pageTitle'] = "Elusi : Berkas Yudisium";
            $this->loadViews("dashboard_berkas_yudisium", $this->global, $data);
        }
    }
    public function add_form(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $this->global['pageTitle'] = "Elusi : Tambah Berkas Yudisium ";
            $this->loadViews("add_berkas_yudisium", $this->global);
        }
    }
    public function add(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $nama_berkas = trim($this->input->post('nama_berkas'));

            $data = array(
                'nama_berkas' => $nama_berkas
            );
            $id_berkas_yudisium = $this->berkas_model->insertYudisium($data);

            //        mkdir
            $config['upload_path'] = './uploads/yudisium/' . $id_berkas_yudisium;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '4000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1024';


            if (!is_dir('uploads/yudisium/' . $id_berkas_yudisium)) {
                mkdir('./uploads/yudisium/' . $id_berkas_yudisium, 0777, TRUE);
            }

            if ($id_berkas_yudisium) {
                $this->session->set_flashdata('success', 'Syarat berkas berhasil dibuat');
            } else {
                $this->session->set_flashdata('error', 'Syarat berkas gagal dibuat. Masalah database');
            };

            redirect('akademik/berkas_yudisium');
        }
    }
    public function edit_form($id){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $this->global['pageTitle'] = "Elusi : Edit Berkas Yudisium";
            $data['dataBerkas'] = $this->berkas_model->getBerkasYudisium($id);

            $this->loadViews("edit_berkas_yudisium", $this->global, $data);
        }
    }
    public function edit(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_berkas_yudisium = $this->input->post('id_berkas_yudisium');

            $nama_berkas = trim($this->input->post('nama_berkas'));

            $data = array(
                'nama_berkas' => $nama_berkas,
            );

            $result = $this->berkas_model->updateYudisium($data, $id_berkas_yudisium);
            if ($result) {
                $this->session->set_flashdata('success', 'Berkas berhasil diubah');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate berkas');
            };

            redirect('akademik/berkas_yudisium');
        }
    }
//    change status be off
    public function off(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_berkas_yudisium = $this->input->post("id_berkas_yudisium");
            $result = $this->berkas_model->offYudisium($id_berkas_yudisium);
            if ($result) {
                $this->session->set_flashdata('success', 'Berkas berhasil non-aktif');
            } else {
                $this->session->set_flashdata('error', 'Berkas gagal non-aktif. Masalah database');
            };

            redirect('akademik/berkas_yudisium');
        }
    }
//    change status be on
    public function on(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_berkas_yudisium = $this->input->post("id_berkas_yudisium");
            $result = $this->berkas_model->onYudisium($id_berkas_yudisium);
            if ($result) {
                $this->session->set_flashdata('success', 'Berkas berhasil diaktifkan');
            } else {
                $this->session->set_flashdata('error', 'Berkas gagal diaktifkan. Masalah database');
            };

            redirect('akademik/berkas_yudisium');
        }
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}