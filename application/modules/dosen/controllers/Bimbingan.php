<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:11
 * Description:
 */

class Bimbingan extends BaseController
{
    function index() {
        $this->loadViews("bimbingan", NULL, NULL, NULL);
    }
}