<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:30
 * Description:
 */

class Akademik extends BaseController
{
  public function __construct()
  {
      parent::__construct();
      // $this->load->model('profil_model');
      $this->isLoggedIn();
  }
    function index() {
      $userId = $this->vendorId;
      $data['userId']=$userId;

        $this->loadViews("dashboard", $data, NULL, NULL);
    }
}
