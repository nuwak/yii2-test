<?php

namespace app\controllers;
use Yii;
use app\models\RegForm;
use app\models\LoginForm;

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

    public function actionReg(){

//        if(Yii::$app->request->post()):
//            echo '<pre>';
//            print_r(Yii::$app->request->post());
//            echo '</pre>';
//            Yii::$app->end();
//        endif;

        $model = new RegForm();

        return $this->render(
            'reg',
            ['model' => $model]
        );
    }

    public function actionLogin(){

//        if(Yii::$app->request->post()):
//            echo '<pre>';
//            print_r(Yii::$app->request->post());
//            echo '</pre>';
//            Yii::$app->end();
//        endif;

        $model = new LoginForm();

        return $this->render(
            'login',
            ['model' => $model]
        );
    }

}
