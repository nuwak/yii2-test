<?php

namespace app\controllers;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $hello = 'Примет МИР!';
        return $this->render('index',[
            'hello' => $hello
        ]);
    }

    public function actionTextHello()
    {
        return $this->render('text-hello');
    }

}
