<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:03
 * Description:
 */

class Profil extends BaseController
{
    function index() {
        $this->loadViews("profil", NULL, NULL, NULL);
    }
}