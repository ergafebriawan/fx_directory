<?php
namespace App\Controllers;

class LibraryController extends BaseController
{
    public function index($request, $response)
    {
        $exec = $this->c->db->query('SELECT * FROM fx_library ORDER BY id ASC');
        $data = $exec->fetch_all(MYSQLI_ASSOC);
        return $this->c->view->render($response, 'library.html', ['data' => $data]);
    }

    public function add($request, $response){
        if($request->isPost()){
            $name = $_POST['in_title'];
        }else{
            return $this->c->view->render($response, 'library-upload.html');
        }
    }

}
