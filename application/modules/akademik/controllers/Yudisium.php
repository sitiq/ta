<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 21:15
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
    function accept($idValidYudisium=null, $idMhs)
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
                $this->editOld($idMhs);
            }else{echo "asda";}
        }
    }
}