<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:30
 * Description:
 */

class Dashboard extends BaseController
{
  public function __construct()
  {
      parent::__construct();
      // $this->load->model('profil_model');
      $this->isLoggedIn();
  }
    function index()
    {
      //$data['userId']=$userId;
      $this->loadViews("dashboard");
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}
