<?php

namespace app\controllers;
use Yii;
class MainController extends \yii\web\Controller
{
    public $layout = 'basic'; //Для контроллера можно поределить какой шаблон он будет использовать

    public $defaultAction = 'index';

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

    public function actionSearch($search = null, $year = null){
//        $search = Yii::$app->request->post('search');

        return $this->render(
            'search',
            [
                'search' => $search,
                'year' => $year,
            ]
        );
    }

}
