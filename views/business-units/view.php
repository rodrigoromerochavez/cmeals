<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BusinessUnits $model */

$this->title = $model->business_unit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centro de costos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-units-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'business_unit_id' => $model->business_unit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'business_unit_id' => $model->business_unit_id], [
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
            'business_unit_id',
            'business_name',
            'created_at',
            'status',
            'active',
        ],
    ]) ?>

</div>
