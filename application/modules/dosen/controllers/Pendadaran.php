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
}