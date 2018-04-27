<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_akhir extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('ta_model');
        $this->isLoggedIn();
        $this->load->library('form_validation');
        $this->isAkademik();
    }

    public function index(){
        $data['dataTable'] = $this->ta_model->getTA();
        $this->global['pageTitle'] = "Elusi : Tugas Akhir";
        $this->loadViews("dashboard_ta",$this->global,$data);
    }

    public function detail($id){
        $data['dataMahasiswa'] = $this->ta_model->getTA($id);
        $result = $this->ta_model->getPengajuanTA($id,'diterima');

        if($result[0]->jenis == 'proyek'){
            $detail_proyek = $this->ta_model->getProyek($result[0]->id_proyek);

            $pilihan_ta = array(
                'pilihan' => $result[0]->pilihan,
                'jenis' => $result[0]->jenis,
                'id_ta' => $id,
                'id_pengajuan_ta' => $result[0]->id_pengajuan_ta,
                'nama_proyek' => $detail_proyek[0]->nama_proyek,
                'nama_dosen' => $detail_proyek[0]->nama_dosen
            );
        } else {
            
            $detail_usulan = $this->ta_model->getUsulan($result[0]->id_pengajuan_ta);
            $pilihan_ta = array(
                'judul' => $detail_usulan[0]->judul,
                'deskripsi'=> $detail_usulan[0]->deskripsi,
                'bisnis_rule'=> $detail_usulan[0]->bisnis_rule,
                'id_ta' => $id,
                'file'=> $detail_usulan[0]->file_persetujuan,
                'pilihan' => $result[0]->pilihan,
                'jenis' => $result[0]->jenis,
                'id_dosen' => $detail_usulan[0]->id_dosen,
                'id_pengajuan_ta' => $result[0]->id_pengajuan_ta
            );
            $data['dataDosen'] = $this->ta_model->getDosen();
        }

        
        $data['dataPengajuanTA'] = $pilihan_ta;
        $this->global['pageTitle'] = "Elusi : Detail Tugas Akhir";
        $this->loadViews("detail_ta",$this->global,$data);
    }

    /* MENAMPILKAN HALAMAN INFORMASI MAHASISWA YANG MENGAJUKAN TA*/
    public function plotting($id){
        $data['dataTA'] = $this->ta_model->getTA($id);
        $data['dataDosen'] = $this->ta_model->getDosen();
        $data['dataProyek'] = $this->ta_model->getProyek();
        $data['isMasaRegis'] = $this->ta_model->isMasaRegisTA();
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
        $this->form_validation->set_rules('terima', 'Pilihan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Pilih salah satu tugas akhir terlebih dahulu');
            redirect('akademik/tugas_akhir/plotting/' . $this->input->post('id_ta'));
        } else {
            $tipe_plotting = $this->input->post('terima');
            /* Cek apakah dipilihkan ke proyek secara manual dari akademik atau tidak*/
            if($tipe_plotting == 'manual'){
                $this->form_validation->set_rules('proyek', 'Proyek', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('error', 'Pilih salah satu proyek terlebih dahulu');
                    redirect('akademik/tugas_akhir/plotting/' . $this->input->post('id_ta'));
                } else {
                    $id_proyek = $this->input->post('proyek');
                    $id_ta = $this->input->post('id_ta');
                    $id_mahasiswa = $this->input->post('id_mahasiswa');
                    if($this->ta_model->check_proyek($id_proyek)){
                        $this->session->set_flashdata('error', 'Proyek yang terpilih sudah terplotting di mahasiswa lain');
                        
                        redirect('akademik/tugas_akhir/plotting/' . $id_ta);
                    } else {
                        $data = array(
                            'id_ta' => $id_ta,
                            'pilihan' => 4,
                            'id_proyek' => $id_proyek,
                            'status' => 'diterima',
                            'jenis' => 'proyek'
                        );
                        $result = $this->ta_model->terima_ta($id_ta,NULL,$id_mahasiswa,$data,$id_proyek,NULL);
    
                        if($result){
                            $this->session->set_flashdata('success', 'Tugas akhir telah terploting');
                        } else {
                            $this->session->set_flashdata('error', 'Tugas akhir gagal terploting');
                        };
                        redirect('akademik/tugas_akhir');
                    }
                }
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
                        $result = $this->ta_model->terima_ta($id_ta,$id_pengajuan_ta,$id_mahasiswa,$data,$id_proyek,NULL);
    
                        if($result){
                            $this->session->set_flashdata('success', 'Tugas akhir telah terploting');
                        } else {
                            $this->session->set_flashdata('error', 'Tugas akhir gagal terploting');
                        };
                        redirect('akademik/tugas_akhir');
                    }
                } else {
                    $this->form_validation->set_rules('dosen', 'Dosen', 'required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata('error', 'Pilih salah satu dosen terlebih dahulu');
                        redirect('akademik/tugas_akhir/plotting/' . $this->input->post('id_ta'));
                    } else {
                        $id_dosen = $this->input->post('dosen');
                        $id_ta = $this->input->post('id_ta');
                        $id_mahasiswa = $this->input->post('id_mahasiswa');
                        
                        $data = array(
                            'status' => 'diterima'
                        );
                        $result = $this->ta_model->terima_ta($id_ta,$id_pengajuan_ta,$id_mahasiswa,$data,NULL,$id_dosen);
    
                        if($result){
                            $this->session->set_flashdata('success', 'Tugas akhir telah terploting');
                        } else {
                            $this->session->set_flashdata('error', 'Tugas akhir gagal terploting');
                        };
                        redirect('akademik/tugas_akhir');
                    }
                }
            }
        }
    }

    public function ubah_dosbing(){
        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $id_pengajuan_ta = $this->input->post('id_pengajuan_ta');
        $id_dosen = $this->input->post('dosen');
        $id_ta = $this->input->post('id_ta');

        $result = $this->ta_model->edit_dosbing($id_mahasiswa, $id_pengajuan_ta, $id_dosen);

        if($result){
            $this->session->set_flashdata('success', 'Dosbing telah diubah');
        } else {
            $this->session->set_flashdata('error', 'Dosbing gagal diubah. Masalah database');
        };

        redirect('akademik/tugas_akhir/detail/' . $id_ta);
    }


}