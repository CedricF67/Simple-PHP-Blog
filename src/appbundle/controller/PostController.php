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
        $query = $this->db->show(
            [
                'id' => $id
            ]);
        $post= new Post($query[0]);
        echo $this->twig->render('post\show.html',
            [
                "id" => $post->getid(),
                "title" => $post->getTitle(),
                "subtitle" => $post->getSubtitle(),
                "author" => $post->getAuthor(),
                "createddate" => $post->getCreateddate(),
                "modifieddate" => $post->getModifieddate(),
                "content" => $post->getContent()
            ]
        );
    }

    public function updateAction($id) {
        if (!isset($_POST['title']) && !isset($_POST['subtitle']) && !isset($_POST['author']) && !isset($_POST['content'])) {
            $query = $this->db->show(
                [
                    'id' => $id
                ]);
            $post= new Post($query[0]);
            echo $this->twig->render('post\update.html',
                [
                    "id" => $post->getid(),
                    "title" => $post->getTitle(),
                    "subtitle" => $post->getSubtitle(),
                    "author" => $post->getAuthor(),
                    "createddate" => $post->getCreateddate(),
                    "modifieddate" => $post->getModifieddate(),
                    "content" => $post->getContent()
                ]
            );
        } else {
            $query = $this->db->update(
            [
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'subtitle' => $_POST['subtitle'],
                'author' => $_POST['author'],
                'content' => $_POST['content']
            ]);
            $this->showAction($id);
        }
    }

}