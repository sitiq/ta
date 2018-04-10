<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Error extends BaseController {
    function index() {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}