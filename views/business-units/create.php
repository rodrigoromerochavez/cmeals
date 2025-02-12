<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BusinessUnits $model */

$this->title = Yii::t('app', 'Regitrar Unidad de Negoicio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-units-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
