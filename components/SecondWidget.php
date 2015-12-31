<?php
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 30.12.2015
 * Time: 21:42
 */

namespace app\components;

use yii\base\Widget;

class SecondWidget extends Widget{

    public function init(){
        parent::init();
        ob_start();
    }

    public function run(){
        $content = ob_get_clean();
        return $this->render('second', ['content' => $content]);
    }
}