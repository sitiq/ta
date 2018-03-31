<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:17
 * Description:
 */

class Pengumuman extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('pengumuman_model');
        $this->isLoggedIn();
    }

    public function index(){
        $data['dataTable'] = $this->pengumuman_model->getPengumumanList();
        $this->global['pageTitle'] = "Elusi : Pengumuman";
        $this->loadViews("pengumuman",$this->global,$data);
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}