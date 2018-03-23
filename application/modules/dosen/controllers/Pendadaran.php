<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:07
 * Description:
 */

class Pendadaran extends BaseController
{
    function index() {
        $this->loadViews("uji", NULL, NULL, NULL);
    }
}