<?php
/* @var $this yii\web\View */
/* @var $hello string*/
$this->registerJsFile('@web/js/main-index.js',['position' => $this::POS_HEAD], 'main-index');
$this->registerCssFile('@web/css/main.css'
//    ,['position' => $this::POS_HEAD], 'main' # если эти опции будут указаны, то файл добавиться после всех остальных css стилей.
);
#$this->registerJs('alert("Hello Igor")', $this::POS_READY, 'hello-message');
#$this->registerCss('body {background:#ff0;}')
?>
<h1>main/index</h1>

<p>
<?=$hello?>
</p>
