<?php
/**
 * Created by nad.
 * Date: 03/04/2018
 * Time: 11:32
 * Description:
 */

class Penilaian extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('penilaian_model');
        $this->isLoggedIn();
    }

    public function index(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $data['dataTable'] = $this->penilaian_model->getKomponen();
            $this->global['pageTitle'] = "Elusi : Berkas Penilaian";
            $this->loadViews("dashboard_penilaian", $this->global, $data);
        }
    }
    public function add_form(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $this->global['pageTitle'] = "Elusi : Tambah Penilaian ";
            $this->loadViews("add_penilaian", $this->global);
        }
    }
    public function add(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $nama = trim($this->input->post('nama'));

            $data = array(
                'nama' => $nama
            );
            $result = $this->penilaian_model->insert($data);

            if ($result) {
                $this->session->set_flashdata('success', 'Penilaian berhasil dibuat');
            } else {
                $this->session->set_flashdata('error', 'Penilaian gagal dibuat. Masalah database');
            };

            redirect('akademik/penilaian');
        }
    }
    public function edit_form($id){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $this->global['pageTitle'] = "Elusi : Edit Penilaian";

            $data['dataPenilaian'] = $this->penilaian_model->getKomponen($id);
            $this->loadViews("edit_penilaian", $this->global, $data);
        }
    }
    public function edit(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_komponen = $this->input->post('id_komponen');

            $nama = trim($this->input->post('nama'));

            $data = array(
                'nama' => $nama,
            );

            $result = $this->penilaian_model->update($data, $id_komponen);
            if ($result) {
                $this->session->set_flashdata('success', 'Penilaian berhasil diubah');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate penilaian');
            };

            redirect('akademik/penilaian');
        }
    }
//    change status be off
    public function off(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_komponen = $this->input->post("id_komponen");
            $result = $this->penilaian_model->off($id_komponen);
            if ($result) {
                $this->session->set_flashdata('success', 'Penilaian berhasil non-aktif');
            } else {
                $this->session->set_flashdata('error', 'Penilaian gagal non-aktif. Masalah database');
            };

            redirect('akademik/penilaian');
        }
    }
//    change status be on
    public function on(){
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $id_komponen = $this->input->post("id_komponen");
            $result = $this->penilaian_model->on($id_komponen);
            if ($result) {
                $this->session->set_flashdata('success', 'Penilaian berhasil diaktifkan');
            } else {
                $this->session->set_flashdata('error', 'Penilaian gagal diaktifkan. Masalah database');
            };

            redirect('akademik/penilaian');
        }
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}