<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main;
//        $posts = $model->findAll();
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        $this->with(compact('posts', 'menu'));
    }

}