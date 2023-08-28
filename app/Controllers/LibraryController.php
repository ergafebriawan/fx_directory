<?php

namespace App\Controllers;

class LibraryController extends BaseController
{
    public function index($request, $response)
    {
        session_start();
        $session = '';
        if(isset($_SESSION['admin'])){
            $session = $_SESSION['admin'];
        }

        $exec = $this->c->db->query('SELECT * FROM fx_library ORDER BY id ASC');
        $data = $exec->fetch_all(MYSQLI_ASSOC);
        return $this->c->view->render($response, 'library/library.html', ['data' => $data, 'session' => $session]);
    }

    public function add($request, $response, array $args)
    {
        if ($request->isPost()) {
            $name = $_POST['in_title'];

            $uploaded_files = $request->getUploadedFiles();
            $file = $uploaded_files['in_file'];
            $basePath = $request->getUri()->getBasePath();
            $uploadPath = $basePath.'storage/library/';
            $uploadedFileName = 'fx_library-'.$name.'-'.$file->getClientFilename();
            $upload_file = $uploadPath . $uploadedFileName;

            if (file_exists($upload_file)) {
                return $response->withRedirect('/library-upload');
            }

            if ($file->getError() === UPLOAD_ERR_OK) {
                $file->moveTo($upload_file);
                $this->c->db->query('INSERT INTO fx_library (id, name, path, uploaded_at) VALUES (NULL, "'.$name.'", "'.$upload_file.'", CURRENT_TIMESTAMP)');
                return $response->withRedirect('/library');
            } else {
                return $response->withRedirect('/library-upload');
            }
        } else {
            return $this->c->view->render($response, '/library/library-upload.html');
        }
    }

    public function delete($request, $response, array $args){
        $exec = $this->c->db->query('SELECT path FROM fx_library WHERE id='.$args['id'].' LIMIT 1');
        $data = $exec->fetch_assoc();
        $path_file = $data['path'];

        if(file_exists($path_file)){
            unlink($path_file);
            $this->c->db->query('DELETE FROM fx_library WHERE id='.$args['id']);
        }

        return $response->withRedirect('/library');
    }

    public function download($request, $response, array $args){
        $exec = $this->c->db->query('SELECT path FROM fx_library WHERE id='.$args['id'].' LIMIT 1');
        $data = $exec->fetch_assoc();
        $path_file = $data['path'];

        if(file_exists($path_file)){
            $response = $response->withHeader('Content-Description', 'File Transfer')
            ->withHeader('Content-Type', 'application/octet-stream')
            ->withHeader('Content-Disposition', 'attachment; filename=' . basename($path_file))
            ->withHeader('Content-Length', filesize($path_file));

        readfile($path_file);
        }

        return $response;
    }
}
