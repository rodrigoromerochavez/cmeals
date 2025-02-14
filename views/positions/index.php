<?php

use app\models\Positions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PositionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Cargos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Cargo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'position_id',
            'position_name',
            'businessUnit.business_name',
            'businessUnit.internal_code',
            'business_unit_id',
            'created_at',
            'status',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Positions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'position_id' => $model->position_id]);
                 }
            ],
        ],
    ]); ?>


</div>
