<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_mahasiswa extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('daftar_mahasiswa_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data_mahasiswa = $this->daftar_mahasiswa_model->getMahasiswa();
        $track_mahasiswa = array();

        foreach ($data_mahasiswa as $result) {
            $id_mahasiswa = $result->id_mahasiswa;
            $nilai_result = $this->daftar_mahasiswa_model->get_nilai_akhir($id_mahasiswa);
            
            if($nilai_result != FALSE){
                $nilai_akhir = $nilai_result[0]->nilai_akhir_sidang;
            } else {
                $nilai_akhir = FALSE;
            }

            $array_mahasiswa = array(
                'id_mahasiswa' => $id_mahasiswa,
                'nim' => $result->nim,
                'nama' => $result->nama,
                'no_hp'=> $result->mobile,
                'judul' => $this->daftar_mahasiswa_model->isJudul($id_mahasiswa),
                'sidang' => $this->daftar_mahasiswa_model->isSidang($id_mahasiswa),
                'nilai_akhir' => $nilai_akhir,
                'yudisium' => $this->daftar_mahasiswa_model->isYudisium($id_mahasiswa)
            );

            array_push($track_mahasiswa,$array_mahasiswa);
        }

        $this->global['pageTitle'] = "Elusi : Daftar Mahasiswa"; 
        //$data['nilai'] = $this->daftar_mahasiswa_model->get_nilai_akhir(1)->row()->nilai_akhir_sidang;
        $data['dataTable'] = $track_mahasiswa;
        $this->loadViews("daftar_mahasiswa",$this->global,$data);
    }

    public function detail_mahasiswa($id_mahasiswa){
        $data['dataMahasiswa'] = $this->daftar_mahasiswa_model->getMahasiswa($id_mahasiswa);
        $data['dataDosbing'] = $this->daftar_mahasiswa_model->getDosbing($id_mahasiswa);
        $data['dataJudulTA'] = $this->daftar_mahasiswa_model->getJudulTA($id_mahasiswa);
        $data['dataBerkasSidang'] = $this->daftar_mahasiswa_model->getBerkasSidang($id_mahasiswa);

        $this->loadViews("detail_mahasiswa_view",$this->global,$data);
    }

    
}