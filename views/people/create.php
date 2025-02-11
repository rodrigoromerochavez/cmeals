<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\People $model */

$this->title = Yii::t('app', 'Create People');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peoples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
