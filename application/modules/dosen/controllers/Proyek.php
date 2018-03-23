<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 21:10
 * Description:
 */

class Proyek extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proyek_model');
        $this->isLoggedIn();
    }

    function index()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('proyek_model');

            $data['proyekInfo'] = $this->proyek_model->proyekList('id_dosen');

            $this->loadViews("proyek", $this->global, $data, NULL);
        }
    }
}