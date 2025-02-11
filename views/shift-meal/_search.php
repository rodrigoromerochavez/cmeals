<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ShiftMealSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="shift-meal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shift_meal_id') ?>

    <?= $form->field($model, 'shift_id') ?>

    <?= $form->field($model, 'meal_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
