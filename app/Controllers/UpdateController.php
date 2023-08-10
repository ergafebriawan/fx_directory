<?php
namespace App\Controllers;

use Illuminate\Support\Facades\Redirect;

class UpdateController extends BaseController
{
    public function index($request, $response){
        session_start();
        $session = $_SESSION['admin'];

        $query = $this->c->db->query('SELECT * FROM fx_update ORDER BY id ASC');
        $data = $query->fetch_all(MYSQLI_ASSOC);

        return $this->c->view->render($response, 'update/update.html', ['data' => $data, 'session' => $session]);
    }

    public function detail($request, $response, array $args){
        $data = $this->c->db->query('SELECT * FROM fx_update WHERE id='.$args["id"].' LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'update/update-detail.html', ['data' => $data_set]);
    }

    public function delete($request, $response, array $args){
        $this->c->db->query('DELETE FROM fx_update WHERE id='.$args['id']);
        return $response->withRedirect('/update');
    }

    public function add($request, $response){
        if($request->isPost()){
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $data = [
                "judul" => $title,
                "konten" => $content
            ];
            $exec = $this->c->db->query('INSERT INTO fx_update (id, title, content, created_at) VALUES (NULL, "'.$title.'", "'.$content.'", CURRENT_TIMESTAMP)');

            if($exec){
                return $response->withRedirect('/update');
            }else{
                return $response->withRedirect('/update-add');
            }
        }else{
            return $this->c->view->render($response, 'update/update-add.html');
        }
    }

    public function edit($request, $response, array $args){
        if($request->isPost()){
            $id_update = $_POST['in_id'];
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $exec = $this->c->db->query('UPDATE fx_update SET title="'.$title.'", content="'.$content.'" WHERE id='.$id_update);

            if($exec){
                return $response->withRedirect('/update');
            }else{
                return $response->withRedirect('/update-edit/'.$id_update);
            }
        }else{
            $data = $this->c->db->query('SELECT * FROM fx_update WHERE id='.$args["id"].' LIMIT 1');
            $data_set = $data->fetch_assoc();
            
            return $this->c->view->render($response, 'update/update-edit.html', ['data' => $data_set]);
        }
    }

}
