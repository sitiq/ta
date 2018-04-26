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
     * This function is used to load the main page
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
            $ta_terplotting = $this->pengajuan_model->getTATerplotting($id_mahasiswa[0]->id_mahasiswa);
            if($ta_terplotting){
                $array = [
                    'id_ta' => $ta_terplotting['id_ta'],
                    'judul_ta' => $ta_terplotting['judul_ta'],
                    'dosbing' => $ta_terplotting['dosbing']
                ];
                $data['taTerplotting'] = $array;
            } else {
                $data['taTerplotting'] = $ta_terplotting;
                $taInfo = $this->pengajuan_model->getTa($id_mahasiswa[0]->id_mahasiswa);
                $data['taInfo'] = $taInfo;
               
            }
            $this->loadViews("tugasakhir", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to Tugas Akhir Registration
     */
    function daftar_ta() {
        if($this->isMahasiswa() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            
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
            $id_periode = $this->input->post('id_periode');

            if (!empty($id_mahasiswa)) {
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $bisnis_rule = $this->input->post('bisnis_rule');

                if($jenis[2] == 'proyek' && empty($proyek[2])){
                    $this->session->set_flashdata('error', 'Lengkapi data pengajuan dengan benar');
                    redirect('mahasiswa/pengajuan/tugasakhir');
                } elseif($jenis[2] == 'usul' && (empty($judul) || empty($deskripsi) || empty($bisnis_rule))) {
                    $this->session->set_flashdata('error', 'Lengkapi data pengajuan dengan benar');
                    redirect('mahasiswa/pengajuan/tugasakhir');
                } else {
                    $ta = array(
                        'id_mahasiswa'=>$id_mahasiswa[0]->id_mahasiswa,
                        'id_periode'=>$id_periode,
                    );
    
                    // get id_ta yang barusan dibuat
                    $id_ta = $this->pengajuan_model->addNewTa($ta);
    
                    for ($i=0; $i<3; $i++) {
                        // cek apakah jenis pengajuan ta (proyek/usulan)
                        if ($jenis[$i] == "proyek") {
    
                            if(empty($proyek[$i])){
                                $this->session->set_flashdata('error', 'Lengkapi data secara lengkap');
                                redirect('mahasiswa/pengajuan/tugasakhir');
                            } else {
                                $pengajuan_ta = array(
                                    'id_ta'=>$id_ta,
                                    'id_proyek'=>$proyek[$i],
                                    'pilihan'=>$pilihan[$i],
                                    'jenis'=>$jenis[$i]
                                );
    
                                // insert ke tabel pengajuan TA
                                $resultta = $this->pengajuan_model->addNewPengajuanTa($pengajuan_ta);
                            }
                        } else {
                            // apabila jenis pengajuan ta = usulan
                            $pengajuan_ta = array(
                                'id_ta'=>$id_ta,
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );
    
                            // get id_pengajuan_ta yang telah dibuat insert ke tabel usulan
                            $id_pengajuan_ta = $this->pengajuan_model->addNewPengajuanTa($pengajuan_ta);
                            if (empty($_FILES['file_persetujuan']['name'])) {
                                $usulan = array(
                                    'id_pengajuan_ta' => $id_pengajuan_ta,
                                    'judul' => $judul,
                                    'deskripsi' => $deskripsi,
                                    'bisnis_rule' => $bisnis_rule,
                                    'file_persetujuan' => NULL
                                );
                            } else {
                                $config['upload_path'] = 'uploads/persetujuan';
                                $config['allowed_types'] = 'pdf';
                                $config['max_size'] = 8000;
                                $config['max_width'] = 1024;
                                $config['max_height'] = 1024;
                                $new_name = "persetujuan-" . time();
                                $config['file_name'] = $new_name;
    
                                $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('file_persetujuan')) {
                                    // if upload revisi not match
                                    $error = array('error' => $this->upload->display_errors());
                                    $this->session->set_flashdata('error', $error['error']);
                                    redirect('mahasiswa/pengajuan/tugasakhir');
                                } else {
                                    $terupload = $this->upload->data();
                                    $usulan = array(
                                        'id_pengajuan_ta' => $id_pengajuan_ta,
                                        'judul' => $judul,
                                        'deskripsi' => $deskripsi,
                                        'bisnis_rule' => $bisnis_rule,
                                        'file_persetujuan' => $terupload['file_name']
                                    );
                                }
                            }
                            // add data ke tabel usulan
                            $resultusulan = $this->pengajuan_model->addNewUsulan($usulan);
                        }
                    }
    
                    if($resultta > 0 || $resultusulan > 0)
                    {
                        $this->session->set_flashdata('success', 'Pendaftaran TA berhasil dibuat');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Pendaftaran TA gagal dibuat');
                    }
                }

            } else {
                $this->session->set_flashdata('error', 'Silahkan lengkapi Profil Anda terlebih dahulu');
            }

            redirect('mahasiswa/pengajuan/tugasakhir');
            
        }
    }

    /**
     * This function is used to edit Tugas Akhir
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
                // $judul = $this->input->post('judul');
                // $deskripsi = $this->input->post('deskripsi');
                // $bisnis_rule = $this->input->post('bisnis_rule');
//                $file = $this->input->post('file');

                if (!empty($id_mahasiswa)) {
                    // perulangan edit pengajuan TA
                    for ($i=0; $i<3; $i++) {

                        // cek apakah jenis pengajuan ta (proyek/usulan)
                        if ($jenis[$i] == "proyek") {
                            if ($jenis_pilihan3 == "usul" && $jenis[2] != 'usul') {
                                // apabila jenis pengajuan ta sebelumnya adalah usulan
                                
                                // edit data tabel usulans
                                $resultUsulan = $this->pengajuan_model->deleteUsulan($id_usulan);
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
                            //validasi isian usulan
                            $judul = $this->input->post('judul');
                            $deskripsi = $this->input->post('deskripsi');
                            $bisnis_rule = $this->input->post('bisnis_rule');
                            if(empty($judul) || empty($deskripsi) || empty($bisnis_rule)){
                                $this->session->set_flashdata('error', 'Lengkapi data secara lengkap');
                                redirect('mahasiswa/pengajuan/tugasakhir');
                            } else {
                                // cek apakah jenis pilihan yang sebelumnya adalah usulan
                                if ($jenis_pilihan3 == "usul") {
                                    if (empty($_FILES['file_persetujuan']['name'])) {
                                        $usulan = array(
                                            'id_pengajuan_ta' => $id_pengajuan_ta[$i],
                                            'judul' => $judul,
                                            'deskripsi' => $deskripsi,
                                            'bisnis_rule' => $bisnis_rule,
                                            'file_persetujuan' => NULL
                                        );
                                    } else {
                                        // jenis pengajuan ta = usulan
                                        // before choosen = usulan
                                        $config['upload_path'] = 'uploads/persetujuan';
                                        $config['allowed_types'] = 'pdf';
                                        $config['max_size'] = 8000;
                                        $config['max_width'] = 1024;
                                        $config['max_height'] = 1024;
                                        $new_name = "persetujuan-" . time();
                                        $config['file_name'] = $new_name;
        
                                        $this->load->library('upload', $config);
        
                                        if (!$this->upload->do_upload('file_persetujuan')) {
                                            //if upload revisi not match
                                            $error = array('error' => $this->upload->display_errors());
                                            // $this->session->set_flashdata('error', 'Unggah file gagal!');
                                            $this->session->set_flashdata('error', $error['error']);
                                            redirect('mahasiswa/pengajuan/tugasakhir');
                                        
                                        } else {
                                            $terupload = $this->upload->data();
                                            $usulan = array(
                                                'id_pengajuan_ta' => $id_pengajuan_ta[$i],
                                                'judul' => $judul,
                                                'deskripsi' => $deskripsi,
                                                'bisnis_rule' => $bisnis_rule,
                                                'file_persetujuan' => $terupload['file_name'],
                                            );
                                        }
                                    }
                                    // edit data usulan table
                                    $resultUsulan = $this->pengajuan_model->editUsulan($usulan, $id_usulan);
                                } else {
                                    //jenis pengajuan ta = usulan
                                    //jika pilihan sebelumnya = proyek
                                    if (empty($_FILES['file_persetujuan']['name'])) {
                                        $usulan = array(
                                            'id_pengajuan_ta' => $id_pengajuan_ta[$i],
                                            'judul' => $judul,
                                            'deskripsi' => $deskripsi,
                                            'bisnis_rule' => $bisnis_rule,
                                            'file_persetujuan' => NULL
                                        );
                                    } else {
                                        $config['upload_path'] = 'uploads/persetujuan';
                                        $config['allowed_types'] = 'pdf';
                                        $config['max_size'] = 8000;
                                        $config['max_width'] = 1024;
                                        $config['max_height'] = 1024;
                                        $new_name = "persetujuan-" . time();
                                        $config['file_name'] = $new_name;
        
                                        $this->load->library('upload', $config);
        
                                        if ( ! $this->upload->do_upload('file_persetujuan')) {
                                            // if upload revisi not match
                                            //if upload revisi not match
                                            $error = array('error' => $this->upload->display_errors());
                                            // $this->session->set_flashdata('error', 'Unggah file gagal!');
                                            $this->session->set_flashdata('error', $error['error']);
                                            redirect('mahasiswa/pengajuan/tugasakhir');
                                        } else {
                                            $terupload = $this->upload->data();
                                            $usulan = array(
                                                'id_pengajuan_ta' => $id_pengajuan_ta[$i],
                                                'judul' => $judul,
                                                'deskripsi' => $deskripsi,
                                                'bisnis_rule' => $bisnis_rule,
                                                'file_persetujuan' => $terupload['file_name']
                                            );
                                        }
                                    }
                                    // insert data to usulan table
                                    $resultUsulan = $this->pengajuan_model->addNewUsulan($usulan);
                                }
                            }

                            // id_proyek di set null karna dia memilih usulan
                            $pengajuan_ta = array(
                                'id_proyek'=>null,
                                'pilihan'=>$pilihan[$i],
                                'jenis'=>$jenis[$i]
                            );

                            // edit data pengajuan_ta by id_pengajuan_ta
                            $resultPengajuanTA = $this->pengajuan_model->editPengajuanTa($pengajuan_ta, $id_pengajuan_ta[$i]);
                        }
                    }

                    if ($resultPengajuanTA == TRUE) {
                        $this->session->set_flashdata('success', 'Pengajuan TA telah berhasil diubah');
                    } else {
                        $this->session->set_flashdata('error', 'Pengajuan TA gagal dilakukan');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Silahkan lengkapi Profil Anda terlebih dahulu');
                }

                redirect('mahasiswa/pengajuan/tugasakhir');
            }
        }
    }

    function setNonaktifTA(){
        if($this->input->post('is_ubah') != 1){
            $this->loadViews("404", $this->global, NULL, NULL);
        } else {
            $judul_ta = $this->input->post('judul_ta');
            $id_ta = $this->input->post('id_ta');
            $array = [
                'status_pengambilan' => 'nonaktif'
            ];
            $result = $this->pengajuan_model->nonaktivasiTA($id_ta,$array,$judul_ta);
            if ($result == TRUE) {
                $this->session->set_flashdata('success', 'Tugas Akhir anda berhasil diganti');
                redirect('mahasiswa/pengajuan/tugasakhir');
            } else {
                $this->session->set_flashdata('error', 'Tugas Akhir anda gagal diganti. Masalah database');
            }
        }
    }
    /**
     * This function is used to load the 404 page not found
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }

}