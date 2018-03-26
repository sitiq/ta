<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:32
 * Description:
 */

class Dosen extends BaseController
{
    function index() {
        $id = $this->session->userdata('role');
        $data['id'] = $id;
        $this->loadViews("dashboard", NULL, $data, NULL);
    }
}