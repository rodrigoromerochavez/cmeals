<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ShiftMeal $model */

$this->title = $model->shift_meal_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shift Meals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shift-meal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'shift_meal_id' => $model->shift_meal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'shift_meal_id' => $model->shift_meal_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'shift_meal_id',
            'shift_id',
            'meal_id',
            'created_at',
            'status',
            'active',
        ],
    ]) ?>

</div>
