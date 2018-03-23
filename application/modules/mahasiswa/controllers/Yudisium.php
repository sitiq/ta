<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:28
 * Description:
 */

class Yudisium extends BaseController
{
    function index() {
        $this->loadViews("yudisium", NULL, NULL, NULL);
    }
}