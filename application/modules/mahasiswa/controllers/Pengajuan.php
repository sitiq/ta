<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 11:40
 * Description:
 */

class Pengajuan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_model');
        $this->isLoggedIn();
    }

    /**
     * This function is used to load the profil list
     */
    function tugasakhir() {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $data['userId'] = $userId;
            $data['userRole'] = $this->role;

            $data['proyekInfo'] = $this->pengajuan_model->getProyek();
            $data['periodeInfo'] = $this->pengajuan_model->getPeriode();

            // apabila dia sudah mendaftarkan TA
            $id_mahasiswa = $this->pengajuan_model->getIdMahasiswa($userId);

            $data['taInfo'] = $this->pengajuan_model->getTa($id_mahasiswa[0]->id_mahasiswa);

            $this->loadViews("tugasakhir", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to daftar TA
     */
    function daftar_ta() {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('proyeksatu','Pilihan Proyek','required');
            $this->form_validation->set_rules('proyekdua','Pilihan Proyek','required');

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error', 'Lengkapi Pendaftaran sesuai dengan ketentuan');
                redirect('mahasiswa/pengajuan/tugasakhir');
            }
            else
            {
                $userId = $this->vendorId;
                // get id mahasiswa yang sedang login
                $id_mahasiswa = $this->pengajuan_model->getIdMahasiswa($userId);

                // get urutan pilihan setiap proyek
                $pilihan = array (
                    $this->input->post('satu'),
                    $this->input->post('dua'),
                    $this->input->post('tiga')
                );

                // get pilihan untuk proyek
                $proyek = array(
                    $this->input->post('proyeksatu'),
                    $this->input->post('proyekdua'),
                    $this->input->post('proyektiga')
                );

                // array jenis/kategori pilihan
                $jenis = array (
                    "proyek",
                    "proyek",
                    $this->input->post('jenis_radio')
                );

                // get pilihan untuk ide/usulan
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $bisnis_rule = $this->input->post('bisnis_rule');
                $file = $this->input->post('file');

                if (!empty($id_mahasiswa)) {
                    $ta = array(
                        'id_mahasiswa'=>$id_mahasiswa[0]->id_mahasiswa,
                        'id_periode'=>1,
                    );

                    // get id_ta yang barusan dibuat
                    $id_ta = $this->pengajuan_model->addNewTa($ta);

                    for ($i=0; $i<3; $i++) {
                        // cek apakah jenis pengajuan ta (proyek/usulan)
                        if ($jenis[$i] == "proyek") {

                            $pengajuan_ta = array(
                                'id_ta'=>$id_ta,
                                'id_proyek'=>$proyek[$i],
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );

                            // insert ke tabel pengajuan TA
                            $resultta = $this->pengajuan_model->addNewPengajuanTa($pengajuan_ta);
                        } else {
                            // apabila jenis pengajuan ta = usulan
                            $pengajuan_ta = array(
                                'id_ta'=>$id_ta,
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );

                            // get id_pengajuan_ta yang telah dibuat insert ke tabel usulan
                            $id_pengajuan_ta = $this->pengajuan_model->addNewPengajuanTa($pengajuan_ta);

                            $usulan = array (
                                'id_pengajuan_ta'=>$id_pengajuan_ta,
                                'judul'=>$judul,
                                'deskripsi'=>$deskripsi,
                                'bisnis_rule'=>$bisnis_rule,
                                'file'=>$file
                            );

                            // add data ke tabel usulan
                            $resultusulan = $this->pengajuan_model->addNewUsulan($usulan);
                        }
                    }

                    if($resultta > 0 || $resultusulan > 0)
                    {
                        $this->session->set_flashdata('success', 'Pendaftaran TA created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Pendaftaran TA creation failed');
                    }

                } else {
                    $this->session->set_flashdata('error', 'Silahkan lengkapi Profil Anda terlebih dahulu');
                }

                redirect('mahasiswa/pengajuan/tugasakhir');
            }
        }
    }

    /**
     * This function is used to edit TA
     */
    function edit_ta() {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('proyeksatu','Pilihan Proyek','required');
            $this->form_validation->set_rules('proyekdua','Pilihan Proyek','required');

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error', 'Lengkapi pendaftaran dengan benar');
                redirect('mahasiswa/pengajuan/tugasakhir');
            }
            else
            {
                $userId = $this->vendorId;
                // get id mahasiswa yang sedang login
                $id_mahasiswa = $this->pengajuan_model->getIdMahasiswa($userId);

                // get id_pengajuan_ta
                $id_pengajuan_ta = array (
                    $this->input->post('pilihan1'),
                    $this->input->post('pilihan2'),
                    $this->input->post('pilihan3')
                );

                // get input urutan pilihan setiap proyek
                $pilihan = array (
                    $this->input->post('satu'),
                    $this->input->post('dua'),
                    $this->input->post('tiga')
                );

                // get pilihan untuk proyek
                $proyek = array(
                    $this->input->post('proyeksatu'),
                    $this->input->post('proyekdua'),
                    $this->input->post('proyektiga')
                );

                // get jenis. untuk pilihan 1&2 pasti proyek, namun untuk pilihan 3 disesuaikan dengan user memilih jenis usulan/proyek
                $jenis = array (
                    "proyek",
                    "proyek",
                    $this->input->post('jenis')
                );

                // get jenis yang telah dipilih oleh user sebelumnya
                $jenis_pilihan3 = $this->input->post('jenis_pilihan3');

                // get pilihan untuk ide/usulan
                $id_usulan = $this->input->post('id_usulan'); //get id id_usulan
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $bisnis_rule = $this->input->post('bisnis_rule');
                $file = $this->input->post('file');

                if (!empty($id_mahasiswa)) {
                    // perulangan edit pengajuan TA
                    for ($i=0; $i<3; $i++) {

                        // cek apakah jenis pengajuan ta (proyek/usulan)
                        if ($jenis[$i] == "proyek") {
                            if ($jenis_pilihan3 == "usulan") {
                                // apabila jenis pengajuan ta sebelumnya adalah usulan
                                $usulan = array (
                                    'isDeleted'=>1
                                );

                                // edit data tabel usulan
                                $resultUsulan = $this->pengajuan_model->editUsulan($usulan, $id_usulan);
                            }

                            // inputan 1&2 pasti jenis pengajuan ta = proyek
                            $pengajuan_ta = array(
                                'id_proyek'=>$proyek[$i],
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );

                            // edit data pengajuan ta dengan id_pengajuan_ta masing-masing
                            $resultPengajuanTA = $this->pengajuan_model->editPengajuanTa($pengajuan_ta, $id_pengajuan_ta[$i]);
                        } else {
                            // cek apakah jenis pilihan yang sebelumnya adalah usulan
                            if ($jenis_pilihan3 == "usul") {
                                // jenis pengajuan ta = usulan
                                // sebelumnya pilihannya = usulan
                                $config['upload_path'] = 'uploads/persetujuan';
                                $config['allowed_types'] = 'pdf';
                                $config['max_size'] = 8000;
                                $config['max_width'] = 1024;
                                $config['max_height'] = 1024;
                                $new_name = "persetujuan-" . time();
                                $config['file_name'] = $new_name;

                                $this->load->library('upload', $config);

                                if (!$this->upload->do_upload('file')) {
                                    // if upload revisi tidak sesuai
                                    $error = array('error' => $this->upload->display_errors());
                                    $this->session->set_flashdata('error', 'Unggah file gagal!');
                                } else {
                                    $terupload = $this->upload->data();
                                    $usulan = array(
                                        'judul' => $judul,
                                        'deskripsi' => $deskripsi,
                                        'bisnis_rule' => $bisnis_rule,
                                        'file' => $terupload['file_name'],
                                    );
                                }
                                // edit data tabel usulan
                                $resultUsulan = $this->pengajuan_model->editUsulan($usulan, $id_usulan);
                            } else {
                                // jenis pengajuan ta = usulan
                                // sebelumnya pilihannya = proyek
                                $config['upload_path'] = 'uploads/persetujuan';
                                $config['allowed_types'] = 'pdf';
                                $config['max_size'] = 8000;
                                $config['max_width'] = 1024;
                                $config['max_height'] = 1024;
                                $new_name = "persetujuan-" . time();
                                $config['file_name'] = $new_name;

                                $this->load->library('upload', $config);

                                if (!$this->upload->do_upload('file')) {
                                    // if upload revisi tidak sesuai
                                    $error = array('error' => $this->upload->display_errors());
                                    $this->session->set_flashdata('error', 'Unggah file gagal!');
                                } else {
                                    $terupload = $this->upload->data();
                                    $usulan = array(
                                        'id_pengajuan_ta' => $id_pengajuan_ta[$i],
                                        'judul' => $judul,
                                        'deskripsi' => $deskripsi,
                                        'bisnis_rule' => $bisnis_rule,
                                        'file' => $terupload['file_name'],
                                    );
                                }
                                // insert data ke tabel usulan
                                $resultUsulan = $this->pengajuan_model->addNewUsulan($usulan);
                            }

                            // id_proyek di set null karna dia memilih usulan
                            $pengajuan_ta = array(
                                'id_proyek'=>null,
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );

                            // edit data pengajuan ta dengan id_pengajuan_ta masing-masing
                            $resultPengajuanTA = $this->pengajuan_model->editPengajuanTa($pengajuan_ta, $id_pengajuan_ta[$i]);
                        }
                    }

                    if ($resultPengajuanTA == TRUE) {
                        $this->session->set_flashdata('success', 'Sukses! Edit Pengajuan TA.');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal! Edit Pengajuan TA.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Silahkan lengkapi Profil Anda terlebih dahulu');
                }

                redirect('mahasiswa/pengajuan/tugasakhir');
            }
        }
    }

}