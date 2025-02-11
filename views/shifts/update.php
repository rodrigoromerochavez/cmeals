<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Shifts $model */

$this->title = Yii::t('app', 'Update Shifts: {name}', [
    'name' => $model->shift_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shifts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shift_id, 'url' => ['view', 'shift_id' => $model->shift_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shifts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
