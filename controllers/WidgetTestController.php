<?php
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 01.01.2016
 * Time: 15:56
 */

namespace app\controllers;
class WidgetTestController extends  \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render(
            'index'
        );
    }
}