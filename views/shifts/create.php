<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Shifts $model */

$this->title = Yii::t('app', 'Create Shifts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shifts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
