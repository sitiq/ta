<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:17
 * Description:
 */

class Pengumuman extends BaseController
{
    function index() {
        $this->loadViews("pengumuman", NULL, NULL, NULL);
    }
}