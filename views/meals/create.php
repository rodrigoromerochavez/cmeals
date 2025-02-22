<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Meals $model */

$this->title = Yii::t('app', 'Registrar Comida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Meals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meals-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
