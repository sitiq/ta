<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_akhir extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('ta_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->ta_model->getTA();
        $this->global['pageTitle'] = "Elusi : Tugas Akhir";
        $this->loadViews("dashboard_ta",$this->global,$data);
    }

    public function detail($id){
        $data['dataMahasiswa'] = $this->ta_model->getTA($id);
        $result = $this->ta_model->getPengajuanTA($id,'diterima');
        $pilihan_ta = array();

        if($result[0]->jenis == 'proyek'){
            $detail_proyek = $this->ta_model->getProyek($result[0]->id_proyek);

            $array = array(
                'pilihan' => $result[0]->pilihan,
                'jenis' => $result[0]->jenis,
                'id_pengajuan_ta' => $result[0]->id_pengajuan_ta,
                'nama_proyek' => $detail_proyek[0]->nama_proyek,
                'nama_dosen' => $detail_proyek[0]->nama_dosen
            );
            array_push($pilihan_ta,$array);
        } else {
            $detail_usulan = $this->ta_model->getUsulan($result->id_pengajuan_ta);
            $array = array(
                'judul' => $detail_usulan[0]->judul,
                'deskripsi'=> $detail_usulan[0]->deskripsi,
                'bisnis_rule'=> $detail_usulan[0]->bisnis_rule,
                'file'=> $detail_usulan[0]->file_persetujuan,
                'pilihan' => $result[0]->pilihan,
                'jenis' => $result[0]->jenis,
                'nama_dosen' => $this->ta_model->getDosen($detail_usulan[0]->id_dosen)[0]->nama_dosen,
                'id_pengajuan_ta' => $result[0]->id_pengajuan_ta
            );
            array_push($pilihan_ta,$array);
        }

        $data['dataPengajuanTA'] = $pilihan_ta;
        $this->global['pageTitle'] = "Elusi : Detail Tugas Akhir";
        $this->loadViews("detail_ta",$this->global,$data);
    }

    public function plotting($id){
        $data['dataTA'] = $this->ta_model->getTA($id);
        $data['dataDosen'] = $this->ta_model->getDosen();

        /* Mendapatkan informasi tentang pilihan tugas akhir yang diambil */
        $data_pengajuan = $this->ta_model->getPengajuanTA($id);
        $i=1;
        $pilihan_ta = array();
        foreach ($data_pengajuan as $result) {
            if($result->jenis == 'proyek'){
                $detail_proyek = $this->ta_model->getProyek($result->id_proyek);

                $array = array(
                    'pilihan' => $result->pilihan,
                    'jenis' => $result->jenis,
                    'id_pengajuan_ta' => $result->id_pengajuan_ta,
                    'id_proyek' => $detail_proyek[0]->id_proyek,
                    'nama_proyek' => $detail_proyek[0]->nama_proyek,
                    'nama_dosen' => $detail_proyek[0]->nama_dosen
                );
                array_push($pilihan_ta,$array);
            } else {
                $detail_usulan = $this->ta_model->getUsulan($result->id_pengajuan_ta);
                $array = array(
                    'judul' => $detail_usulan[0]->judul,
                    'deskripsi'=> $detail_usulan[0]->deskripsi,
                    'bisnis_rule'=> $detail_usulan[0]->bisnis_rule,
                    'file'=> $detail_usulan[0]->file_persetujuan,
                    'pilihan' => $result->pilihan,
                    'jenis' => $result->jenis,
                    'id_pengajuan_ta' => $result->id_pengajuan_ta
                );
                array_push($pilihan_ta,$array);
            }
        }
        $data['dataPengajuanTA'] = $pilihan_ta;

        $this->global['pageTitle'] = "Elusi : Plotting Tugas Akhir"; 
        $this->loadViews("plotting_ta",$this->global,$data);
    }

    public function plotting_ta(){
        $tipe_plotting = $this->input->post('terima');
        if($tipe_plotting == 'manual'){
            redirect('akademik/tugas_akhir/ploting_manual');
        } else {
            $id_ta = $this->input->post('id_ta');
            $id_mahasiswa = $this->input->post('id_mahasiswa');

            $id_pengajuan_ta = explode(' ',$tipe_plotting)[0];
            $jenis = explode(' ',$tipe_plotting)[1];
            if($jenis != 'usulan'){
                $id_proyek = $jenis;

                if($this->ta_model->check_proyek($id_proyek)){
                    $this->session->set_flashdata('error', 'Proyek yang terpilih sudah terplotting di mahasiswa lain');
                    
                    redirect('akademik/tugas_akhir/plotting/' . $id_ta);
                } else {
                    $data = array(
                        'status' => 'diterima'
                    );
                    $result = $this->ta_model->accept_status($id_ta,$id_pengajuan_ta,$id_mahasiswa,$data);

                    if($result){
                        $this->session->set_flashdata('success', 'Tugas akhir telah terploting');
                    } else {
                        $this->session->set_flashdata('error', 'Tugas akhir gagal terploting');
                    };
                    redirect('akademik/tugas_akhir');
                }
            } else {
                $data = array(
                    'status' => 'diterima'
                );
                $result = $this->ta_model->accept_status($id_ta,$id_pengajuan_ta,$id_mahasiswa,$data);

                if($result){
                    $this->session->set_flashdata('success', 'Tugas akhir telah terploting');
                } else {
                    $this->session->set_flashdata('error', 'Tugas akhir gagal terploting');
                };
                redirect('akademik/tugas_akhir');
            }
        }
    }

    public function ploting_manual(){

    }


}