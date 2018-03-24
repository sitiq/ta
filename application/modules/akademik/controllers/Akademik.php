<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->isLoggedIn();
    }

    public function index(){
        redirect('akademik/dashboard');
    }
}