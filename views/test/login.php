<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\widgets\ActiveField;
?>
<?php if (Yii::$app->session->hasFlash('kal')): ?>
    <div class="alert alert-success"> <strong> <?=Yii::$app->session->getFlash('kal') ?> </strong>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('errors')): ?>
    <div class="alert alert-success"> <strong> <?=Yii::$app->session->getFlash('errors') ?> </strong>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['id' => 'LoginuModel','enableAjaxValidation' => true, 'enableClientValidation' =>true ]); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Введите имя пользователя или E-mail адресс'])->label('Имя пользователя')?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль'])->label('Пароль') ?>
    <?= Html::submitButton('Войти', ['name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>
