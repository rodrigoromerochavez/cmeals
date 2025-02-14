<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\People $model */

$this->title = Yii::t('app', 'Actualizar Persona: {name}', [
    'name' => $model->person_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peoples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_id, 'url' => ['view', 'person_id' => $model->person_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="people-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
