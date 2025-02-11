<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ShiftMeal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="shift-meal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shift_id')->textInput() ?>

    <?= $form->field($model, 'meal_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
