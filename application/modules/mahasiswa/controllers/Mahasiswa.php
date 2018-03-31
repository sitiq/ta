<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:35
 * Description:
 */

class Mahasiswa extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->isLoggedIn();
    }
    /**
     * This function is used to load the main page
     */
    public function index(){
        $userId = $this->vendorId;

        $data['pesanInfo'] = $this->dashboard_model->getPesanList($userId);
        $data['revisiInfo'] = $this->dashboard_model->getRevisiSidang($userId);
        $this->global['pageTitle'] = "Elusi : Dashboard";
        $this->loadViews("dashboard",$this->global,$data);
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