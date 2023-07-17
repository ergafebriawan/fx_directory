<?php
/*
 * HomeController only for controller sample
 * @hilmanrdn 18-01-2017
 */

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
        $data = $this->c->db->query('SELECT * FROM fx_set WHERE title="pengantar" LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'home.html', ['data' => $data_set]);
    }

    public function about($request, $response){
        $data = $this->c->db->query('SELECT * FROM fx_set WHERE title="tentang" LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'about.html', ['data' => $data_set]);
    }
}
