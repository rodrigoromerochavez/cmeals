<?php

use app\models\ShiftMeal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ShiftMealSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Shift Meals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-meal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Shift Meal'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shift_meal_id',
            'shift_id',
            'meal_id',
            'created_at',
            'status',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ShiftMeal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'shift_meal_id' => $model->shift_meal_id]);
                 }
            ],
        ],
    ]); ?>


</div>
