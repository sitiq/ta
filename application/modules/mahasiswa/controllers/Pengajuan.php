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
            $userRole = $this->role;

            $data['proyekInfo'] = $this->pengajuan_model->getProyek();
            $data['userId'] = $userId;
            $data['userRole'] = $userRole;

            $this->loadViews("tugasakhir", $this->global, $data, NULL);
        }
    }

}