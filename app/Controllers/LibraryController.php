<?php
/*
 * HomeController only for controller sample
 * @hilmanrdn 18-01-2017
 */

namespace App\Controllers;

class LibraryController extends BaseController
{
    public function index($request, $response)
    {
        return $this->c->view->render($response, 'library.html');
    }

    public function add($request, $response){
        if($request->isMethod('post')){

        }else{
            return $this->c->view->render($response, 'library-upload.html');
        }
    }

}
