<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\People $model */

$this->title = Yii::t('app', 'Registrar Persona');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peoples'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
