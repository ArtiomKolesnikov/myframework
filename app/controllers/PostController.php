<?php
namespace app\controllers;

class PostController extends AppController
{
    public function indexAction()
    {
        $this->layout = false;
        echo 'порсто index post без шаблона';
    }

    public function addAction()
    {
    }

    public function getPostsAction()
    {
    }
}