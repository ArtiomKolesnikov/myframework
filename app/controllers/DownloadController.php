<?php

namespace app\controllers;

class DownloadController extends AppController
{
    public function indexAction()
    {
        $menu = $this->menu;
        $this->with(compact('posts', 'menu'));
    }
}