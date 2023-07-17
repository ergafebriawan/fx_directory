<?php
/*
 * HomeController only for controller sample
 * @hilmanrdn 18-01-2017
 */

namespace App\Controllers;

class UpdateController extends BaseController
{
    public function index($request, $response){
        return $this->c->view->render($response, 'update.html');
    }

}
