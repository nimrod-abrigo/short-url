<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Exam';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Exam: URL Shortener</h1>
    </div>
    <?php
    if(Yii::$app->session->hasFlash('shortLink')){
        echo "<p class='success'><strong>Short URL is:</strong> <a href='".Yii::$app->session->getFlash('shortLink')."'>".Yii::$app->session->getFlash('shortLink')."</a></p>";
    }
    $form=ActiveForm::begin();
    ?>
    <?= $form->field($model,'url');?>
    <p class="text-primary">Ex. https://www.google.com.ph/?gfe_rd=cr&ei=DDhCWMibOsOI8AWg6LygAw</p>

    <center><?= Html::submitButton('Submit',['class'=>'btn btn-primary btn-lg']);?></center>
    <?php $form->end(); ?>
</div>
