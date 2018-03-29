<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 07:10
 * Description:
 */

class Sidang extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('sidang_model');
        $this->isLoggedIn();
    }
    function index()
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['sidangInfo'] = $this->sidang_model->getSidangInfo();
            $data['dosenInfo'] = $this->sidang_model->getDosen();
            $data['ketuaInfo'] = $this->sidang_model->getPengujiKetua();
            $data['sekreInfo'] = $this->sidang_model->getPengujiSekre();
            $this->loadViews("dashboard_sidang", $this->global, $data, NULL);
        }
    }
    function editOld($sidangId = NULL)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($sidangId == null)
            {
                redirect('akademik/sidang');
            }
            $data['sidangInfo'] = $this->sidang_model->getSidangInfo($sidangId);
            $data['berkasInfo'] = $this->sidang_model->getBerkas($sidangId);
            $this->loadViews("edit_sidang", $this->global, $data, NULL);
        }
    }
    function accept($idValidSidang=null, $idMhs)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            if (!empty($idValidSidang)) {
                $berkasInfo = array(
                    'id_valid_sidang' => $idValidSidang,
                    'isValid' => 2,
                );

                $result = $this->sidang_model->accBerkas($berkasInfo, $idValidSidang);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'File accepted');
                } else {
                    $this->session->set_flashdata('error', 'File accept failed');
                }
//                $this->editOld($idMhs);
                redirect('akademik/sidang/editOld/'.$idMhs);
            }else{echo "asda";}
        }
    }
    /**
     * This function is used to add new message to the system
     */
    function pesan($idValidSidang=null)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $idMhs = $this->input->post('id_mahasiswa');

            $this->form_validation->set_rules('nama','Judul','trim|required|max_length[128]');
            $this->form_validation->set_rules('deskripsi','Pesan','trim|required|max_length[128]');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($idMhs);
            }
            else
            {
                if (!empty($idValidSidang)) {
                    $berkasInfo = array(
                        'id_valid_sidang' => $idValidSidang,
                        'isValid' => 3,
                    );

                    $result = $this->sidang_model->decBerkas($berkasInfo, $idValidSidang);

                    if ($result == true) {
                        $this->session->set_flashdata('success', 'File rejected');
                    } else {
                        $this->session->set_flashdata('error', 'File reject failed');
                    }
                    $this->editOld($idMhs);
                }
                $nama = $this->input->post('nama');
                $deskripsi = $this->input->post('deskripsi');

                $pesanInfo = array('id_mahasiswa'=>$idMhs, 'nama'=>$nama, 'deskripsi'=>$deskripsi);

                $result = $this->sidang_model->addPesan($pesanInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Revision sent');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Revision unsent');
                }
                redirect('akademik/sidang/editOld/'.$idMhs);
//                $this->editOld($idMhs);
            }
        }
    }
    function plot($idSidang=null, $idMhs)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $tanggal = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal')), 'Y-m-d');
            $waktu = $this->input->post('waktu');
            $ruang = $this->input->post('ruang');
            $idKetua = $this->input->post('id_dosen_ketua');
            $idSekre = $this->input->post('id_dosen_sekre');
            $idAnggota = $this->input->post('id_nama_dosbing');
            $anggota = $this->input->post('anggota');
            $sekre = $this->input->post('sekre');
            $ketua = $this->input->post('ketua');


            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[128]');
            $this->form_validation->set_rules('waktu','Waktu','trim|required|max_length[128]');
            $this->form_validation->set_rules('ruang','Ruang','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_dosen_ketua','Ketua','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_dosen_sekre','Sekretaris','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_nama_dosbing','Anggota','trim|required|max_length[128]');


            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                if (!empty($idSidang)) {
                    $statusInfo = array(
                        'id_sidang' => $idSidang,
                        'status' => 'disetujui',
                    );
                    $status = $this->sidang_model->editStatus($statusInfo, $idSidang);

                    $pesanInfo = array(
                        'id_mahasiswa'=>$idMhs,
                        'nama'=>'Pendaftaran sidang diterima.',
                        'deskripsi'=>'Sidang akan dilaksanakan pada '.$tanggal.' , pukul : '.$waktu.' , di ruang : '.$ruang
                    );
                    $result = $this->sidang_model->addPesan($pesanInfo);

                    $jadwalInfo = array(
                        'id_sidang' => $idSidang,
                        'waktu' => $waktu,
                        'tanggal' => $tanggal,
                        'ruang' => $ruang,
                    );
                    $jadwal = $this->sidang_model->addJadwal($jadwalInfo);

                    $ketuaInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idKetua,
                        'role' => $ketua
                    );
                    $sekreInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idSekre,
                        'role' => $sekre
                    );
                    $anggotaInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idAnggota,
                        'role' => $anggota
                    );
                    $dosen1 = $this->sidang_model->addAnggota($ketuaInfo);
                    $dosen2 = $this->sidang_model->addAnggota($sekreInfo);
                    $dosen3 = $this->sidang_model->addAnggota($anggotaInfo);

                    $penilaianInfo = array(
                        "id_sidang"=>$idSidang,
                        "id_anggota_sidang"=>$dosen1
                    );
                    $penilaianInfo2 = array(
                        "id_sidang"=>$idSidang,
                        "id_anggota_sidang"=>$dosen2
                    );
                    $penilaianInfo3 = array(
                        "id_sidang"=>$idSidang,
                        "id_anggota_sidang"=>$dosen3
                    );
                    $idPenilaian = $this->sidang_model->addPenilaian($penilaianInfo);
                    $idPenilaian2 = $this->sidang_model->addPenilaian($penilaianInfo2);
                    $idPenilaian3 = $this->sidang_model->addPenilaian($penilaianInfo3);

                    //insert to komponen nilai table
                    $idKomponen = 1;
                    for ($i=1;$i<=10;$i++){
                        $daftarNilaiId = array(
                            "id_penilaian"=>$idPenilaian,
                            "id_komponen"=>$idKomponen
                        );
                        $result1 = $this->sidang_model->addNewKomponenNilai($daftarNilaiId);
                        $idKomponen++;
                    }
                    $idKomponen2 = 1;
                    for ($i=1;$i<=10;$i++){
                        $daftarNilaiId2 = array(
                            "id_penilaian"=>$idPenilaian2,
                            "id_komponen"=>$idKomponen2
                        );
                        $result2 = $this->sidang_model->addNewKomponenNilai($daftarNilaiId2);
                        $idKomponen2++;
                    }
                    $idKomponen3 = 1;
                    for ($i=1;$i<=10;$i++){
                        $daftarNilaiId3 = array(
                            "id_penilaian"=>$idPenilaian3,
                            "id_komponen"=>$idKomponen3
                        );
                        $result = $this->sidang_model->addNewKomponenNilai($daftarNilaiId3);
                        $idKomponen3++;
                    }
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Jadwal berhasil dibuat!');
                    } else {
                        $this->session->set_flashdata('error', 'Jadwal gagal dibuat!');
                    }
                    redirect('akademik/sidang');
                }
            }
        }
    }
    function editPlot($idSidang=null, $idMhs)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            $this->load->library('form_validation');
            $tanggal = date_format(date_create_from_format('d/m/Y', $this->input->post('tanggal')), 'Y-m-d');
            $waktu = $this->input->post('waktu');
            $ruang = $this->input->post('ruang');
            $idKetua = $this->input->post('id_dosen_ketua');
            $idSekre = $this->input->post('id_dosen_sekre');
            $idAnggota = $this->input->post('id_nama_dosbing');
            $anggota = $this->input->post('anggota');
            $sekre = $this->input->post('sekre');
            $ketua = $this->input->post('ketua');


            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[128]');
            $this->form_validation->set_rules('waktu','Waktu','trim|required|max_length[128]');
            $this->form_validation->set_rules('ruang','Ruang','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_dosen_ketua','Ketua','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_dosen_sekre','Sekretaris','trim|required|max_length[128]');
            $this->form_validation->set_rules('id_nama_dosbing','Anggota','trim|required|max_length[128]');

            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                if (!empty($idSidang)) {

                    $pesanInfo = array(
                        'id_mahasiswa'=>$idMhs,
                        'nama'=>'Pelaksanaan sidang telah diubah.',
                        'deskripsi'=>'Sidang akan dilaksanakan pada '.$tanggal.' , pukul : '.$waktu.' , di ruang : '.$ruang
                    );
                    $result = $this->sidang_model->addPesan($pesanInfo);

                    $jadwalInfo = array(
                        'id_sidang' => $idSidang,
                        'waktu' => $waktu,
                        'tanggal' => $tanggal,
                        'ruang' => $ruang,
                    );
                    $jadwal = $this->sidang_model->editJadwal($jadwalInfo, $idSidang);

                    $ketuaInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idKetua,
                        'role' => $ketua
                    );
                    $sekreInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idSekre,
                        'role' => $sekre
                    );
                    $anggotaInfo = array(
                        'id_sidang' => $idSidang,
                        'id_dosen' => $idAnggota,
                        'role' => $anggota
                    );
                    $dosen1 = $this->sidang_model->editKetua($ketuaInfo, $idKetua);
                    $dosen2 = $this->sidang_model->editSekre($sekreInfo, $idSekre);
                    $result = $this->sidang_model->editAnggota($anggotaInfo, $idAnggota);

                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Jadwal berhasil diubah!');
                    } else {
                        $this->session->set_flashdata('error', 'Jadwal gagal diubah!');
                    }
                    redirect('akademik/sidang');
                }else{echo "asda";}
            }
        }
    }
}