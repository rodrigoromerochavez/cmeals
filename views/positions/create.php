<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Positions $model */

$this->title = Yii::t('app', 'Registrar Cargo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
