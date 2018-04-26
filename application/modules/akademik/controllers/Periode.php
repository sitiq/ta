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
        $this->loadViews("add_periode",$this->global);
    }

    public function add_period(){
        $semester = trim($this->input->post('semester'));
        $tahun_ajaran = trim($this->input->post('tahun_ajaran'));
        if($tahun_ajaran == NULL){
            $thn_ajaran1 = trim($this->input->post('thn1'));
            $thn_ajaran2 = trim($this->input->post('thn2'));
            $tahun_ajaran = $thn_ajaran1 . "/" . $thn_ajaran2;
        }

        // $tanggal_awal = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_awal')), 'Y-m-d');
        // $tanggal_akhir = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal_akhir')), 'Y-m-d');

        // $tanggal_awal_regis = $tanggal_awal . " " .  $this->input->post('waktu_awal') . ":00";
        // $tanggal_akhir_regis = $tanggal_akhir . " " . $this->input->post('waktu_akhir') . ":00";
        $data_periode = array(
            'semester' => $semester,
            'tahun_ajaran' => $tahun_ajaran,
            'status_periode' => 1
        );

        $result = $this->periode_model->insert($data_periode);
        if($result){
            $this->session->set_flashdata('success', 'Periode berhasil diganti');
        } else {
            $this->session->set_flashdata('error', 'Periode gagal diganti. Masalah database');
        };

        redirect('akademik/periode');
    }


    public function change_status($id_periode,$jenis,$status){
        if($jenis == 'ta'){
            $result = $this->periode_model->edit_status($id_periode,'ta',$status);
        } else {
            $result = $this->periode_model->edit_status($id_periode,'yudisium',$status);
        }
            
        if($result){
            $this->session->set_flashdata('success', 'Periode registrasi berhasil di-nonaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menonaktifkan periode');
        }

        redirect('akademik/periode');
    }

    public function edit_tanggal_regis($jenis_regis){
        $id_periode = $this->input->post('id_periode');

        
        if($jenis_regis == 'ta'){
            $tanggal_awal_ta = date_format(date_create_from_format('d-m-Y', $this->input->post('tanggal_awal_ta')), 'Y-m-d');
            $tanggal_akhir_ta = date_format(date_create_from_format('d-m-Y', $this->input->post('tanggal_akhir_ta')), 'Y-m-d');
        
            $data = array(
                'tgl_awal_regis_ta' => $tanggal_awal_ta,
                'tgl_akhir_regis_ta' => $tanggal_akhir_ta
            );
            $result = $this->periode_model->update($data,$id_periode);
            if($result){
                $this->session->set_flashdata('success', 'Tanggal registrasi tugas akhir telah terupdate');
            } else {
                $this->session->set_flashdata('error', 'Tanggal registrasi tugas akhir gagal terupdate');
            };
        } else {
            $tanggal_awal_yudisium = date_format(date_create_from_format('d-m-Y', $this->input->post('tanggal_awal_yudisium')), 'Y-m-d');
            $tanggal_akhir_yudisium = date_format(date_create_from_format('d-m-Y', $this->input->post('tanggal_akhir_yudisium')), 'Y-m-d');

            $data = array(
                'tgl_awal_regis_yudisium' => $tanggal_awal_yudisium,
                'tgl_akhir_regis_yudisium' => $tanggal_akhir_yudisium
            );

            $result = $this->periode_model->update($data,$id_periode);
            if($result){
                $this->session->set_flashdata('success', 'Tanggal registrasi yudisium telah terupdate');
            } else {
                $this->session->set_flashdata('error', 'Tanggal registrasi yudisium gagal terupdate');
            };
        }
        

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