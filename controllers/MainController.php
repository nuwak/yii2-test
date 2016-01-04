<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\Profile;

class MainController extends BehaviorsController
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

        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($user = $model->reg()):
                if($user->status === User::STATUS_ACTIVE):
                    if(Yii::$app->getUser()->login($user)):
                        return $this->goHome();
                    endif;
                endif;
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

        if(!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;
//        $model->scenario = 'default';

        if($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;

        return $this->render(
            'login',
            ['model' => $model]
        );
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->redirect(['/main/index']);
    }

    public function actionProfile(){
        $model = ($model = Profile::findOne(Yii::$app->user->id)) ? $model : new Profile();

        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($model->updateProfile()):
                Yii::$app->session->setFlash('success','Профиль изменен');
            else:
                Yii::$app->session->setFlash('error', 'Профиль не изменен');
                Yii::error('Ошибка записи. Профиль не изменен');
                return $this->refresh();
            endif;
        endif;

        return $this->render('profile', ['model' => $model]);
    }

}
