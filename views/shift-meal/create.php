<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ShiftMeal $model */

$this->title = Yii::t('app', 'Create Shift Meal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shift Meals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-meal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
