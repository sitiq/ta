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
                $this->editOld($idMhs);
            }
        }
    }
}