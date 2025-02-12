<?php

use app\models\BusinessUnits;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BusinessUnitsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Unidades de Negocios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-units-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Unidad '), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            'business_unit_id',
            'business_name',
            'created_at',
            'status',
            'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BusinessUnits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'business_unit_id' => $model->business_unit_id]);
                 }
            ],
        ],
    ]); ?>


</div>
