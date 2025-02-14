<?php

use app\models\People;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeopleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Personas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'Create People'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person_id',
            'first_name',
            'last_name',
            'id_card',
            'position.position_name',
            'position_id',
            //'created_at',
            //'status',
            //'active',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, People $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'person_id' => $model->person_id]);
                 }
            ],
        ],
    ]); ?>


</div>
