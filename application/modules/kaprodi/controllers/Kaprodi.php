<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:33
 * Description:
 */

class Kaprodi extends BaseController
{
    function index() {
        $this->loadViews("dashboard", NULL, NULL, NULL);
    }
}