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

    public function add($request, $response){
        if($request->isMethod('get')){
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $data = [
                "judul" => "hehe",
                "konten" => "hehehehe"
            ];
            var_dump($data);
        }else{
            return $this->c->view->render($response, 'update-add.html');
        }
    }

}
