<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->proyek_model->getProyek();
        $this->global['pageTitle'] = "Elusi : Proyek"; 
        $this->loadViews("dashboard_proyek",$this->global,$data);
    }

    public function add_form(){
        $data['dataDosen'] = $this->proyek_model->getDosen();
        $this->global['pageTitle'] = "Elusi : Tambah Proyek"; 
        $this->loadViews("add_proyek",$this->global,$data);
    }

    public function edit_form($id){
        $data['dataDosen'] = $this->proyek_model->getDosen();
        $data['dataProyek'] = $this->proyek_model->getProyek($id);
        $data['dataStatus'] = $this->proyek_model->getStatus();
        $this->global['pageTitle'] = "Elusi : Tambah Proyek"; 
        $this->loadViews("edit_proyek",$this->global,$data);
    }

    public function add(){
        $id_dosen = trim($this->input->post('select_dosen'));
        $nama_proyek = trim($this->input->post('nama_proyek'));
        $instansi = trim($this->input->post('instansi'));

        
        $data = array(
            'id_dosen' => $id_dosen,
            'nama'=> $nama_proyek,
            'klien'=> $instansi,
            'status'=> 'pending'
        );

        $result = $this->proyek_model->insert($data);
        if($result){
            $this->session->set_flashdata('success', 'Proyek baru telah ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Proyek gagal ditambahkan. (Masalah database)');
        };

        redirect('akademik/proyek');
    }

    public function edit(){
        $id_proyek = trim($this->input->post('id_proyek'));
        $id_dosen = trim($this->input->post('select_dosen'));
        $nama_proyek = trim($this->input->post('nama_proyek'));
        $instansi = trim($this->input->post('instansi'));
        $status = trim($this->input->post('status'));

        $data = array(
            'id_dosen' => $id_dosen,
            'nama'=> $nama_proyek,
            'klien' => $instansi,
            'status'=> $status
        );
        
        $result = $this->proyek_model->update($data,$id_proyek);
        if($result){
            $this->session->set_flashdata('success', 'Proyek telah diubah');
        } else {
            $this->session->set_flashdata('error', 'Proyek gagal diubah. (Masalah database)');
        };

        redirect('akademik/proyek');
    }

    public function delete(){
        $id_proyek = $this->input->post("id_proyek");
        $result = $this->proyek_model->delete($id_proyek);
        if($result){
            $this->session->set_flashdata('success', 'Proyek berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Proyek gagal dihapus. Masalah di database');
        };

        redirect('akademik/proyek');
    }

    public function accept(){
        $id_proyek = $this->input->post('id_proyek');
        $result = $this->proyek_model->change_status($id_proyek,1);
        $nama = $this->proyek_model->getProyek($id_proyek)[0]->nama_proyek;
        if($result){
            $this->session->set_flashdata('success', 'Proyek '. $nama .' telah disetujui');
        } else {
            $this->session->set_flashdata('error', 'Proyek gagal disetujui. Masalah di database');
        };
        redirect('akademik/proyek');
    }

    public function decline(){
        $id_proyek = $this->input->post('id_proyek');
        $result = $this->proyek_model->change_status($id_proyek,0);
        $nama = $this->proyek_model->getProyek($id_proyek)[0]->nama_proyek;
        if($result){
            $this->session->set_flashdata('success', 'Proyek '. $nama .' telah ditolak');
        } else {
            $this->session->set_flashdata('error', 'Proyek gagal ditolak. Masalah di database');
        };
        redirect('akademik/proyek');
    }

    public function multiple_action(){
        $array_data = $this->input->post('table_records');
        $submit = $this->input->post('submit_form');
        if(!empty($array_data) && $submit == 1){
            for ($i=0; $i < count($array_data); $i++) { 
                $result = $this->proyek_model->change_status($array_data[$i],1);
            }
            if($result){
                $this->session->set_flashdata('success', count($array_data) . ' Proyek telah disetujui');
            } else {
                $this->session->set_flashdata('error', 'Proyek gagal disetujui. Masalah di database');
            };
        } elseif(!empty($array_data) && $submit == 0){
            for ($i=0; $i < count($array_data); $i++) { 
                $result = $this->proyek_model->change_status($array_data[$i],0);
            }
            if($result){
                $this->session->set_flashdata('success', count($array_data) . ' Proyek telah ditolak');
            } else {
                $this->session->set_flashdata('error', 'Proyek gagal ditolak. Masalah di database');
            };
        }
        else {
            $this->session->set_flashdata('error', 'Pilih salah satu proyek terlebih dahulu');
        }

        redirect('akademik/proyek');
    }
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}