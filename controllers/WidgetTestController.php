<?php
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 01.01.2016
 * Time: 15:56
 */

namespace app\controllers;

//use Yii;

class WidgetTestController extends  BehaviorsController
{
    public function actionIndex()
    {
//        return Yii::$app->response->sendFile('files/hello.txt')->send(); //Отправляет файл на скачивание на компьютер пользователя

//        $search_some = 'Пример поиска';
//        return $this->redirect([
//           'main/search',
//            'search' => $search_some,
//        ]);

        return $this->render('index');
    }
}