<?php

use app\models\Shifts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ShiftsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Shifts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Shifts'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shift_id',
            'shift_name',
            'start_time',
            'end_time',
            'created_at',
            //'status',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Shifts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'shift_id' => $model->shift_id]);
                 }
            ],
        ],
    ]); ?>


</div>
