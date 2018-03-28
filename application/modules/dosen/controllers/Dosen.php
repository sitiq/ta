<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:32
 * Description:
 */

class Dosen extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
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
//            $userRole = $this->role;
            $userId = $this->vendorId;

            $this->global['pageTitle'] = "Elusi : Dashboard";
            $data['countBimbingan'] = $this->dashboard_model->getCountBimbingan($userId);
            $data['countPendadaran'] = $this->dashboard_model->getCountPendadaran($userId);
            $data['countProyek'] = $this->dashboard_model->getCountProyek($userId);

            //------------- Cek Periode PKL -------------//
//            $data['cekPeriode'] = $this->dosen_model->cekPeriode(date('Y')); // cek info periode pada tahun ini
            $this->loadViews("dashboard", $this->global, $data, NULL);
        }
    }
}