<?php

namespace Controllers;

use Entities\Post;

class PostController {

	public function createAction() {
        echo 'create';
    }

    public function deleteAction($id) {
        echo 'delete' . $id;
    }

	public function listAction() {
        echo 'list';
    }

    public function showAction($id) {
        echo 'show' . $id;
    }

    public function updateAction($id) {
        echo 'update' . $id;
    }

}