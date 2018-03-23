<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:21
 * Description:
 */

class Berkas extends BaseController
{
    function index() {
        $this->loadViews("berkas", NULL, NULL, NULL);
    }
}