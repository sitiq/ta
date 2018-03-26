<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:11
 * Description:
 */

class Bimbingan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bimbingan_model');
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
            $data['bimbinganInfo'] = $this->bimbingan_model->getBimbingan($userId);
            $data['userId'] = $userId;
            $data['userRole'] = $userRole;

            $this->loadViews("bimbingan", $this->global, $data, NULL);
        }
    }
}