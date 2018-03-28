<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 07:10
 * Description:
 */

class Yudisium extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('yudisium_model');
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
            $data['yudisiumInfo'] = $this->yudisium_model->getYudisiumInfo();
            $this->loadViews("dashboard_yudisium", $this->global, $data, NULL);
        }
    }
    function editOld($yudisiumId = NULL)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($yudisiumId == null)
            {
                redirect('akademik/yudisium');
            }
            $data['yudisiumInfo'] = $this->yudisium_model->getYudisiumInfo($yudisiumId);
            $data['berkasInfo'] = $this->yudisium_model->getBerkas($yudisiumId);
            $this->loadViews("edit_yudisium", $this->global, $data, NULL);
        }
    }
    function accept($idValidYudisium=null, $idYudisium)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            if (!empty($idValidYudisium)) {
                $berkasInfo = array(
                    'id_valid_yudisium' => $idValidYudisium,
                    'isValid' => 2,
                );

                $result = $this->yudisium_model->accBerkas($berkasInfo, $idValidYudisium);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'File accepted');
                } else {
                    $this->session->set_flashdata('error', 'File accept failed');
                }
                redirect('akademik/yudisium/editOld/'.$idYudisium);
//                $this->editOld($idMhs);
            }else{echo "asda";}
        }
    }
    /**
     * This function is used to add new message to the system
     */
    function pesan($idValidYudisium=null)
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
                if (!empty($idValidYudisium)) {
                    $berkasInfo = array(
                        'id_valid_yudisium' => $idValidYudisium,
                        'isValid' => 3,
                    );

                    $result = $this->yudisium_model->decBerkas($berkasInfo, $idValidYudisium);

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

                $result = $this->yudisium_model->addPesan($pesanInfo);

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