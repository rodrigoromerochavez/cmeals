<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ShiftMeal $model */

$this->title = Yii::t('app', 'Update Shift Meal: {name}', [
    'name' => $model->shift_meal_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shift Meals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shift_meal_id, 'url' => ['view', 'shift_meal_id' => $model->shift_meal_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shift-meal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
