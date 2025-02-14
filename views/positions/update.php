<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Positions $model */

$this->title = Yii::t('app', 'Actualizar Cargo: {name}', [
    'name' => $model->position_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->position_id, 'url' => ['view', 'position_id' => $model->position_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="positions-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
