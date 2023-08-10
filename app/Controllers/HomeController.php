<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
        session_start();
        $session = $_SESSION['admin'];
        
        $data = $this->c->db->query('SELECT * FROM fx_set WHERE title="pengantar" LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'home.html', ['data' => $data_set, 'session' => $session]);
    }

    public function about($request, $response){
        session_start();
        $session = $_SESSION['admin'];

        $data = $this->c->db->query('SELECT * FROM fx_set WHERE title="tentang" LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'about.html', ['data' => $data_set, 'session' => $session]);
    }
}
