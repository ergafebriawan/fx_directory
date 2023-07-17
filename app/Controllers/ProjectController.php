<?php
/*
 * HomeController only for controller sample
 * @hilmanrdn 18-01-2017
 */

namespace App\Controllers;

class ProjectController extends BaseController
{
    public function index($request, $response)
    {
        return $this->c->view->render($response, 'project.html');
    }

    public function add($request, $response){
        if($request->isMethod('post')){

        }else{
            return $this->c->view->render($response, 'project-add.html');
        }
    }

    public function detail($request, $response){
        return $this->c->view->render($response, 'project-detail.html');
    }

}
