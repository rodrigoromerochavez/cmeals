<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Shifts $model */

$this->title = Yii::t('app', 'Crear Turno');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifts-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
