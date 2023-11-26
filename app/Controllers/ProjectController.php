<?php

namespace App\Controllers;

class ProjectController extends BaseController
{
    public function index($request, $response)
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            return $response->withRedirect('/');
        }
        $session = $_SESSION['admin'];

        $query = $this->c->db->query('SELECT * FROM fx_project ORDER BY id ASC');
        $data = $query->fetch_all(MYSQLI_ASSOC);

        return $this->c->view->render($response, 'project/project.html', ['data' => $data, 'session' => $session]);
    }

    public function add($request, $response)
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            return $response->withRedirect('/');
        }
        $session = $_SESSION['admin'];

        if ($request->isPost()) {
            $title = $_POST['in_title'];
            $content = $_POST['in_content'];

            $exec = $this->c->db->query('INSERT INTO fx_project (id, title, content, created_at, updated_at) VALUES (NULL, "' . $title . '", "' . $content . '", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');

            if ($exec) {
                return $response->withRedirect('/project');
            } else {
                return $response->withRedirect('/project-add');
            }
        } else {
            return $this->c->view->render($response, 'project/project-add.html', ['session' => $session]);
        }
    }

    public function detail($request, $response, array $args)
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            return $response->withRedirect('/');
        }
        $session = $_SESSION['admin'];

        $data = $this->c->db->query('SELECT * FROM fx_project WHERE id=' . $args["id"] . ' LIMIT 1');
        $data_set = $data->fetch_assoc();
        return $this->c->view->render($response, 'project/project-detail.html', ['data' => $data_set, 'session' => $session]);
    }

    public function delete($request, $response, array $args)
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            return $response->withRedirect('/');
        }

        $this->c->db->query('DELETE FROM fx_project WHERE id=' . $args['id']);
        return $response->withRedirect('/project');
    }

    public function edit($request, $response, array $args)
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            return $response->withRedirect('/');
        }

        if ($request->isPost()) {
            $id_project = $_POST['in_id'];
            $title      = $_POST['in_title'];
            $content    = $_POST['in_content'];

            $exec = $this->c->db->query('UPDATE fx_project SET title="' . $title . '", content="' . $content . '", updated_at=CURRENT_TIMESTAMP WHERE id=' . $id_project);

            if ($exec) {
                return $response->withRedirect('/project');
            } else {
                return $response->withRedirect('/project-update/' . $id_project);
            }
        } else {
            $session = $_SESSION['admin'];
            $data = $this->c->db->query('SELECT * FROM fx_project WHERE id=' . $args["id"] . ' LIMIT 1');
            $data_set = $data->fetch_assoc();

            return $this->c->view->render($response, 'project/project-update.html', ['data' => $data_set, 'session' => $session]);
        }
    }

    //controller for API
    public function get_all($resquest, $response)
    {
        $query = $this->c->db->query('SELECT * FROM fx_project ORDER BY id ASC');
        $data = $query->fetch_all(MYSQLI_ASSOC);

        $res = [];

        if ($data != null) {
            $res = [
                'state'     => true,
                'message'   => 'show all data project',
                'data'      => $data
            ];
            return json_encode($res);
        } else {
            $res = [
                'state'     => false,
                'message'   => 'no data',
                'data'      => null
            ];
            return json_encode($res);
        }
    }

    public function add_project($request, $response)
    {
        $title = $request->getParsedBody()['title'];
        $content = $request->getParsedBody()['content'];

        $exec = $this->c->db->query('INSERT INTO fx_project (id, title, content, created_at, updated_at) VALUES (NULL, "' . $title . '", "' . $content . '", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');

        $res = [];
        if ($exec) {
            $res = [
                'state'     => true,
                'message'   => 'success adding data project'
            ];
            return json_encode($res);
        } else {
            $res = [
                'state'     => false,
                'message'   => 'failed adding data project'
            ];
            return json_encode($res);
        }
    }

    public function get_detail($request, $response)
    {
        $id = $request->getAttribute('id');
        $query = $this->c->db->query('SELECT * FROM fx_project WHERE id=' . $id . ' LIMIT 1');
        $data = $query->fetch_all(MYSQLI_ASSOC);

        $res = [];

        if ($data != null) {
            $res = [
                'state'     => true,
                'message'   => 'show detail data project',
                'data'      => $data
            ];
            return json_encode($res);
        } else {
            $res = [
                'state'     => false,
                'message'   => 'invalid id',
                'data'      => null
            ];
            return json_encode($res);
        }
    }

    public function update_project($request, $response)
    {
        $id_project = $request->getAttribute('id');
        $title = $request->getParsedBody()['title'];
        $content = $request->getParsedBody()['content'];

        $exec = $this->c->db->query('UPDATE fx_project SET title="' . $title . '", content="' . $content . '", updated_at=CURRENT_TIMESTAMP WHERE id=' . $id_project);
        $res = [];
        if ($exec) {
            $res = [
                'state'     => true,
                'message'   => 'success update data project'
            ];
            return json_encode($res);
        } else {
            $res = [
                'state'     => false,
                'message'   => 'failed update data project'
            ];
            return json_encode($res);
        }
    }

    public function delete_project($request, $response)
    {
        $id = $request->getAttribute('id');
        $this->c->db->query('DELETE FROM fx_project WHERE id=' . $id);;
        $res = [
            'state'     => true,
            'message'   => 'success delete data project'
        ];
        return json_encode($res);
    }

    public function archive_project($request, $response)
    {
    }
}
