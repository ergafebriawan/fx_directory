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
        $query = $this->c->db->query('SELECT * FROM fx_project ORDER BY id ASC');
        $data = $query->fetch_all(MYSQLI_ASSOC);

        return $this->c->view->render($response, 'project.html', ['data' => $data]);
    }

    public function add($request, $response){
        if($request->isPost()){
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $exec = $this->c->db->query('INSERT INTO fx_project (id, title, content, created_at, updated_at) VALUES (NULL, "'.$title.'", "'.$content.'", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');

            if($exec){
                return $response->withRedirect('/project');
            }else{
                return $response->withRedirect('/project-add');
            }
        }else{
            return $this->c->view->render($response, 'project-add.html');
        }
    }

    public function detail($request, $response, array $args){
        $data = $this->c->db->query('SELECT * FROM fx_project WHERE id='.$args["id"].' LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'project-detail.html', ['data' => $data_set]);
    }

    public function delete($request, $response, array $args){
        $this->c->db->query('DELETE FROM fx_project WHERE id='.$args['id']);
        return $response->withRedirect('/project');
    }

    public function edit($request, $response, array $args){
        if($request->isPost()){
            $id_project = $_POST['in_id'];
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $exec = $this->c->db->query('UPDATE fx_project SET title="'.$title.'", content="'.$content.'", updated_at=CURRENT_TIMESTAMP WHERE id='.$id_project);

            if($exec){
                return $response->withRedirect('/project');
            }else{
                return $response->withRedirect('/project-update/'.$id_project);
            }
        }else{
            $data = $this->c->db->query('SELECT * FROM fx_project WHERE id='.$args["id"].' LIMIT 1');
            $data_set = $data->fetch_assoc();
            
            return $this->c->view->render($response, 'project-update.html', ['data' => $data_set]);
        }
    }

}
