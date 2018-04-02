<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by nad.
 * Date: 02/04/2018
 * Time: 19:15
 * Description:
 */

class Berkas_sidang extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('berkas_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->berkas_model->getBerkas();
        $this->global['pageTitle'] = "Elusi : Berkas Sidang";
        $this->loadViews("dashboard_berkas_sidang",$this->global,$data);
    }
    public function add_form(){
        $this->global['pageTitle'] = "Elusi : Tambah Berkas Sidang ";
        $this->loadViews("add_berkas",$this->global);
    }
    public function add(){
        $nama_berkas = trim($this->input->post('nama_berkas'));

        $data = array(
            'nama_berkas' => $nama_berkas
        );
        $id_berkas_sidang = $this->berkas_model->insert($data);

        //        mkdir
        $config['upload_path'] = './uploads/sidang/'.$id_berkas_sidang;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '4000';
        $config['max_width']  = '1024';
        $config['max_height']  = '1024';


        if (!is_dir('uploads/sidang/'.$id_berkas_sidang)) {
            mkdir('./uploads/sidang/' . $id_berkas_sidang, 0777, TRUE);
        }

        if($id_berkas_sidang){
            $this->session->set_flashdata('success', 'Syarat berkas berhasil dibuat');
        } else {
            $this->session->set_flashdata('error', 'Syarat berkas gagal dibuat. Masalah database');
        };

        redirect('akademik/berkas_sidang');
    }
    public function edit_form($id){
        $this->global['pageTitle'] = "Elusi : Edit Berkas Sidang";
        $data['dataBerkas'] = $this->berkas_model->getBerkas($id);

        $this->loadViews("edit_berkas",$this->global,$data);
    }
    public function edit(){
        $id_berkas_sidang = $this->input->post('id_berkas_sidang');

        $nama_berkas = trim($this->input->post('nama_berkas'));

        $data = array(
            'nama_berkas' => $nama_berkas,
        );

        $result = $this->berkas_model->update($data,$id_berkas_sidang);
        if($result){
            $this->session->set_flashdata('success', 'Berkas berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate berkas');
        };

        redirect('akademik/berkas_sidang');
    }
//    change status be off
    public function off(){
        $id_berkas_sidang = $this->input->post("id_berkas_sidang");
        $result = $this->berkas_model->off($id_berkas_sidang);
        if($result){
            $this->session->set_flashdata('success', 'Berkas berhasil non-aktif');
        } else {
            $this->session->set_flashdata('error', 'Berkas gagal non-aktif. Masalah database');
        };

        redirect('akademik/berkas_sidang');
    }
//    change status be on
    public function on(){
        $id_berkas_sidang = $this->input->post("id_berkas_sidang");
        $result = $this->berkas_model->on($id_berkas_sidang);
        if($result){
            $this->session->set_flashdata('success', 'Berkas berhasil diaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Berkas gagal diaktifkan. Masalah database');
        };

        redirect('akademik/berkas_sidang');
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}