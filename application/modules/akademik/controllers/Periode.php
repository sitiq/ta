<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('periode_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataPeriode'] = $this->periode_model->getPeriodeAktif();
        $this->global['pageTitle'] = "Elusi : Periode";
        $this->loadViews("dashboard_periode",$this->global,$data);
    }

    public function ubah_periode(){
        $this->global['pageTitle'] = "Elusi :  Periode "; 
        $this->loadViews("ganti_periode",$this->global);
    }

    public function edit_form($id){
        $this->global['pageTitle'] = "Elusi : Edit Periode"; 
        $data['dataPeriode'] = $this->periode_model->getPeriode($id);
        $data['tanggal_awal'] = date_format(date_create_from_format('Y-m-d', explode(' ',$data['dataPeriode'][0]->tanggal_awal_regis)[0]), 'd/m/Y');
        $data['tanggal_akhir'] = date_format(date_create_from_format('Y-m-d', explode(' ',$data['dataPeriode'][0]->tanggal_akhir_regis)[0]), 'd/m/Y');
        //$data['lol'] = $data['dataPeriode'][0]->tanggal_awal_regis;
        $data['waktu_awal'] = explode(' ',$data['dataPeriode'][0]->tanggal_awal_regis)[1];
        $data['waktu_akhir'] = explode(' ',$data['dataPeriode'][0]->tanggal_akhir_regis)[1];


        $this->loadViews("edit_periode",$this->global,$data);
    }

    public function change(){
        $semester = trim($this->input->post('semester'));
        $thn_ajaran1 = trim($this->input->post('thn1'));
        $thn_ajaran2 = trim($this->input->post('thn2'));
        $tahun_ajaran = $thn_ajaran1 . "/" . $thn_ajaran2;

        // $tanggal_awal = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_awal')), 'Y-m-d');
        // $tanggal_akhir = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_akhir')), 'Y-m-d');

        // $tanggal_awal_regis = $tanggal_awal . " " .  $this->input->post('waktu_awal') . ":00";
        // $tanggal_akhir_regis = $tanggal_akhir . " " . $this->input->post('waktu_akhir') . ":00";
        $data_periode = array(
            array(
                'semester' => $semester,
                'tahun_ajaran' => $tahun_ajaran,
                'jenis' => 'ta',
                'status_regis' => 0,
                'status_periode' => 1
            ),
            array(
                'semester' => $semester,
                'tahun_ajaran' => $tahun_ajaran,
                'jenis' => 'yudisium',
                'status_regis' => 0,
                'status_periode' => 1
            )
        );

        $result = $this->periode_model->insert_multiple($data_periode);
        if($result){
            $this->session->set_flashdata('success', 'Periode berhasil diganti');
        } else {
            $this->session->set_flashdata('error', 'Periode gagal diganti. Masalah database');
        };

        redirect('akademik/periode');
    }

    public function change_status($id_periode,$status){
        if($status == 1){
            $result = $this->periode_model->edit_status($id_periode,$status);
            if($result){
                $this->session->set_flashdata('success', 'Periode registrasi berhasil diaktifkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengaktifkan periode');
            };
        } else {
            $result = $this->periode_model->edit_status($id_periode,$status);
            if($result){
                $this->session->set_flashdata('success', 'Periode registrasi berhasil di-nonaktifkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menonaktifkan periode');
            };
        };
        redirect('akademik/periode');
    }

    public function edit(){
        $id_periode = $this->input->post('id_periode');

        $semester = trim($this->input->post('semester'));
        $thn_ajaran1 = trim($this->input->post('thn1'));
        $thn_ajaran2 = trim($this->input->post('thn2'));
        $tahun_ajaran = $thn_ajaran1 . "/" . $thn_ajaran2;

        $tanggal_awal = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_awal')), 'Y-m-d');
        $tanggal_akhir = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_akhir')), 'Y-m-d');

        $tanggal_awal_regis = $tanggal_awal . " " .  $this->input->post('waktu_awal') . ":00";
        $tanggal_akhir_regis = $tanggal_akhir . " " . $this->input->post('waktu_akhir') . ":00";
        
        $data = array(
            'semester' => $semester,
            'tahun_ajaran' => $tahun_ajaran,
            'jenis' => $this->input->post('jenis'),
            'tanggal_awal_regis' => $tanggal_awal_regis,
            'tanggal_akhir_regis' => $tanggal_akhir_regis
        );
        $result = $this->periode_model->update($data,$id_periode);
        if($result){
            $this->session->set_flashdata('success', 'Periode berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate periode');
        };

        redirect('akademik/periode');
    }

    public function delete(){
        $id_periode = $this->input->post("id_periode");
        $result = $this->periode_model->delete($id_periode);
        if($result){
            $this->session->set_flashdata('success', 'Periode berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Periode gagal dihapus. Masalah database');
        };

        redirect('akademik/periode');
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}