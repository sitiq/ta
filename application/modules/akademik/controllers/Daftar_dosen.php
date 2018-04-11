<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_dosen extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('daftar_dosen_model');
        $this->isLoggedIn();
    }

    public function index(){
        $this->global['pageTitle'] = "Elusi : Daftar Dosen"; 
        $dataProfil = $this->daftar_dosen_model->getDosen();

        $data['dataTable'] = array();
        if($dataProfil) {
            foreach ($dataProfil as $record) {
                $id_dosen = $record->id_dosen;
                $array = array(
                    'id_dosen' => $record->id_dosen,
                    'nid' => $record->nid,
                    'nama_dosen' => $record->nama,
                    'mobile' => $record->mobile,
                    'bimbingan' => $this->daftar_dosen_model->getBimbinganCount($id_dosen),
                    'sidang' => $this->daftar_dosen_model->getSidangCount($id_dosen)
                );
                array_push($data['dataTable'],$array);
            }
        } 
        $this->loadViews("daftar_dosen",$this->global,$data);
    }

    public function bimbingan($id_dosen){
        
        $data_mahasiswa = $this->daftar_dosen_model->getBimbingan($id_dosen);
        $track_mahasiswa = array();
        if($data_mahasiswa){
            foreach ($data_mahasiswa as $result) {
                $id_mahasiswa = $result->id_mahasiswa;
                $nilai_result = $this->daftar_dosen_model->get_nilai_akhir($id_mahasiswa);
                
                if($nilai_result != FALSE){
                    $nilai_akhir = $nilai_result[0]->nilai_akhir_sidang;
                } else {
                    $nilai_akhir = FALSE;
                }

                $result_judul = $this->daftar_dosen_model->getJudulTA($id_mahasiswa);
                if($result_judul) {
                    $judulTA = $result_judul;
                } else {
                    $judulTA = "<i>(Belum mengambil judul)</i>";
                }

                $array_mahasiswa = array(
                    'id_mahasiswa' => $id_mahasiswa,
                    'nim' => $result->nim,
                    'nama' => $result->nama,
                    'judul'=> $judulTA,
                    'isJudul' => $this->daftar_dosen_model->isJudul($id_mahasiswa),
                    'isSidang' => $this->daftar_dosen_model->isSidang($id_mahasiswa),
                    'nilai_akhir' => $nilai_akhir,
                    'isYudisium' => $this->daftar_dosen_model->isYudisium($id_mahasiswa)
                );

                
                array_push($track_mahasiswa,$array_mahasiswa);
            }
        }
        $this->global['pageTitle'] = "Elusi : Daftar Bimbingan Dosen"; 
        $data['dataMahasiswa'] = $track_mahasiswa;

        $this->loadViews("daftar_bimbingan",$this->global,$data);
    }

    
}