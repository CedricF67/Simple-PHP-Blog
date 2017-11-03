<?php

namespace Controllers;

use Entities\Post;

class PostController extends Controller {

	public function createAction() {
        echo 'create';
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