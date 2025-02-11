<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Positions $model */

$this->title = Yii::t('app', 'Create Positions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
