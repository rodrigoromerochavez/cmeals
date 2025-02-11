<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Meals $model */

$this->title = Yii::t('app', 'Update Meals: {name}', [
    'name' => $model->meal_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Meals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meal_id, 'url' => ['view', 'meal_id' => $model->meal_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="meals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
