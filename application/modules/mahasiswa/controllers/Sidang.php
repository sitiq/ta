<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:27
 * Description:
 */

class Sidang extends BaseController
{
    function index() {
        $this->loadViews("sidang", NULL, NULL, NULL);
    }
}