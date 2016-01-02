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
        $model = new RegForm();

//        $model->scenario = 'test';

        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($model->reg()):
                return $this->goHome();
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;
        return $this->render(
            'reg',
            ['model' => $model]
        );
    }

    public function actionLogin(){
        $model = new LoginForm();

//        $model->scenario = 'default';

        if($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;

        return $this->render(
            'login',
            ['model' => $model]
        );
    }

}
