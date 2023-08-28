<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login($request, $response, array $args)
    {
        $token = explode('_', $args['token']);
        $key = $token[0];
        $answer = $token[1];
        $date = $token[2];
        $ex = $this->c->db->query('SELECT * FROM fx_answer WHERE kunci="' . $key . '" AND answer="' . $answer . '" LIMIT 1');
        $auth = $ex->fetch_assoc();
        if ($auth == null && $date != date('d-m-Y')) {
            return $response->withRedirect('/');
        } else {
            if ($request->isPost()) {
                session_start();
                $username = $_POST['in_username'];
                $password = md5($_POST['in_password']);
                $exec = $this->c->db->query('SELECT * FROM fx_user WHERE username="' . $username . '" LIMIT 1');
                $data = $exec->fetch_assoc();
                if ($data['username'] === $username && $data['password'] === $password) {
                    $_SESSION['admin'] = $username . '-' . $password . '-act';
                    $this->c->db->query('UPDATE fx_user SET updated_at=CURRENT_TIMESTAMP WHERE id=' . $data['id']);
                    return $response->withRedirect('/');
                } else {
                    return $response->withRedirect('/login');
                }
            } else {
                session_start();
                if (isset($_SESSION['admin'])) {
                    return $response->withRedirect('/');
                }
                return $this->c->view->render($response, 'login.html', ['key' => $args['token']]);
            }
        }
    }

    public function logout($request, $response)
    {
        session_start();
        session_destroy();
        return $response->withRedirect('/');
    }

    public function riddle($request, $response)
    {
        $answer = md5($_POST['answer']);
        $exec = $this->c->db->query('SELECT * FROM fx_answer WHERE answer="'.$answer.'" LIMIT 1');
        $data = $exec->fetch_assoc();
        if($data == null){
            return $response->withRedirect('/');
        }else{
            $key = $data['kunci'].'_'.$data['answer'].'_'.date('d-m-Y');
            return $response->withRedirect('/login/'.$key);
        }
    }
}
