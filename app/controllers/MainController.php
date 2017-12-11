<?php
namespace app\controllers;

class MainController extends AppController
{
    public function indexAction()
    {
        $name = 'ArtKol';
        $car = [
            'mark' => 'Toyota',
            'model' => 'Mark II'
        ];
        $this->with(compact('name','car'));
    }

}