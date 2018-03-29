<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:07
 * Description:
 */

class Pendadaran extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendadaran_model');
        $this->isLoggedIn();
    }
    /**
     * This function is used to load the profil list
     */
    function index()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $userRole = $this->role;
            $data['pendadaranInfo'] = $this->pendadaran_model->getSidang($userId);
            $data['userId'] = $userId;
            $data['userRole'] = $userRole;
            $this->global['pageTitle'] = "Elusi : Pendadaran";

            $this->loadViews("uji", $this->global, $data, NULL);
        }
    }
    function nilai()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $data['nilaiInfo'] = $this->pendadaran_model->getNilaiInfo($userId);
            $this->global['pageTitle'] = "Elusi : Sidang";
            $this->loadViews("nilai", $this->global, $data, NULL);
        }
    }
    function submitNilai()
    {
        if ($this->isDosen() == true)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $last_index = $this->input->post('last_index');
            $id_penilaian = $this->input->post('id_penilaian');
            $id_sidang = $this->input->post('id_sidang');
            echo $last_index;
            $total = 0;
            for ( $i = 1; $i < $last_index; $i++ )
            {
                $radio_value = $this->input->post('radio_'.$i);
                $array_explode = explode(' ',$radio_value);
                $id_komponen_nilai_value = $array_explode[0];
                $id_nilai_value = $array_explode[1];
                $data = array(
                    'nilai' => $id_nilai_value
                );
                $result1 = $this->pendadaran_model->editKomponenNilai($data, $id_komponen_nilai_value);
                $total = $total+($id_nilai_value/10);
            }

            $result2 = $this->pendadaran_model->editPenilaian($total, $id_penilaian);
            $nilai_akhir_sidang = $total/3;

            $result = $this->pendadaran_model->editSidang($nilai_akhir_sidang ,$id_sidang);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Sidang berhasil dinilai!');
            }
            else
            {
                $this->session->set_flashdata('error', 'Sidang gagal dinilai!');
            }
            redirect("dosen/pendadaran/nilai/$id_penilaian");
        }
    }
    function submitRevisi () {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $id_penilaian = $this->input->post('id_penilaian');

            $this->form_validation->set_rules('id_anggota_sidang','id','required');

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('success', 'lele');
                redirect("dosen/pendadaran/nilai/$id_penilaian");
            }
            else {
                $id_anggota_sidang = $this->input->post('id_anggota_sidang');

                $config['upload_path'] = 'uploads/sidang/revisi';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 8000;
                $config['max_width'] = 1024;
                $config['max_height'] = 1024;
                $new_name = "revisi-" . time();
                $config['file_name'] = $new_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('path')) {
                    // if upload revisi tidak sesuai
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', 'Unggah file gagal!');
                } else {
                    // bila upload revisi berhasil
                    $terupload = $this->upload->data();
                    $revisiInfo = array(
                        'path' => $terupload['file_name'],
                        'id_anggota_sidang' => $id_anggota_sidang
                    );
                    $result = $this->pendadaran_model->addNewRevisi($revisiInfo);
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Unggah revisi berhasil!');
                    } else {
                        $this->session->set_flashdata('error', 'Unggah revisi gagal!');
                    }
                }
                redirect("dosen/pendadaran/nilai/$id_penilaian");
            }
        }
    }
}