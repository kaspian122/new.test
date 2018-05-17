<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\widgets\ActiveField;
?>

<h1>  ТУТА </h1>
<?php if (Yii::$app->session->hasFlash('kal')): ?>
    <div class="alert alert-danger"> <strong> <?=Yii::$app->session->getFlash('kal') ?> </strong>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('success1')): ?>
    <div class="alert alert-success"> <strong> <?=Yii::$app->session->getFlash('success1') ?> </strong>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php endif; ?>
<div> <?= Html::a('login',['test/login'],['class'=>'btn btn-success']) ?> </div>

<div class="pl">

<?php debug(Yii::$app->request->post()) ?>
<?php $form = ActiveForm::begin(['id' => 'Users','enableAjaxValidation' => true, 'enableClientValidation' =>true ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Введите имя пользователя'])->label('Имя пользователя')?>

    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите E-mail адресс'])->label('E-mail')?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль'])->label('Пароль') ?>

    <?= $form->field($model, '_password')->passwordInput(['placeholder' => 'Введите пароль повторно'])->label('Подтверждение пароля') ?>

    <?= $form->field($model, 'name')->textInput()->label('Имя') ?>

    <?= Html::submitButton('Sigin', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>

</div class='pl'>