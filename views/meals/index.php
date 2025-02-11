<?php

use app\models\Meals;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MealsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Meals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meals-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Meals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'meal_id',
            'meal_name',
            'created_at',
            'status',
            'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Meals $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'meal_id' => $model->meal_id]);
                 }
            ],
        ],
    ]); ?>


</div>
