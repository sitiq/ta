<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('periode_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->periode_model->getPeriode();
        $this->global['pageTitle'] = "Elusi : Periode"; 
        $this->loadViews("periode_view",$this->global,$data);
    }

    public function add_form(){
        $this->global['pageTitle'] = "Elusi : Tambah Periode "; 
        $this->loadViews("add_periode",$this->global);
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

    public function add(){
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
        $result = $this->periode_model->insert($data);
        if($result){
            $this->session->set_flashdata('success', 'New Periode created successfully');
        } else {
            $this->session->set_flashdata('error', 'Periode creation failed');
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
            $this->session->set_flashdata('success', 'New Periode updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate periode');
        };

        redirect('akademik/periode');
    }

    public function delete(){
        $id_periode = $this->input->post("id_periode");
        $result = $this->periode_model->delete($id_periode);
        if($result){
            $this->session->set_flashdata('success', 'User Deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Delete User failed');
        };

        redirect('akademik/periode');
    }




    
}