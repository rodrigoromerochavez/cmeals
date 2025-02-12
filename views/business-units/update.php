<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BusinessUnits $model */

$this->title = Yii::t('app', 'Update Business Units: {name}', [
    'name' => $model->business_unit_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->business_unit_id, 'url' => ['view', 'business_unit_id' => $model->business_unit_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="business-units-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
