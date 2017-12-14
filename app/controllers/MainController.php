<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
        $posts = $model->findAll();
//        dd($posts);
        $this->with(compact('posts'));
    }

}