<?php

namespace Controllers;

use Entities\Post;

class PostController extends Controller {

    public function createAction() {
        if (!isset($_POST['title']) && !isset($_POST['subtitle']) && !isset($_POST['author']) && !isset($_POST['content'])) {
        echo $this->twig->render('post\create.html');
        } else {
            $query = $this->db->insert(
            [
                'title' => $_POST['title'],
                'subtitle' => $_POST['subtitle'],
                'author' => $_POST['author'],
                'content' => $_POST['content']
            ]);
            $id = $this->db->lastid();
            $this->showAction($id['MAX(id)']);
        }
    }

    public function deleteAction($id) {
        echo 'delete' . $id;
    }

    public function listAction() {
        $postslist = $this->db->select();
        echo $this->twig->render('post\list.html',
            [
                "postslist" => $postslist
            ]
        );
    }

    public function showAction($id) {
        echo 'show' . $id;
    }

    public function updateAction($id) {
        echo 'update' . $id;
    }

}