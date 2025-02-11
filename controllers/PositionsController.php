<?php

namespace app\controllers;

use app\models\Positions;
use app\models\PositionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PositionsController implements the CRUD actions for Positions model.
 */
class PositionsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Positions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PositionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Positions model.
     * @param int $position_id ID del cargo o posición
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($position_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($position_id),
        ]);
    }

    /**
     * Creates a new Positions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Positions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'position_id' => $model->position_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Positions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $position_id ID del cargo o posición
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($position_id)
    {
        $model = $this->findModel($position_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'position_id' => $model->position_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Positions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $position_id ID del cargo o posición
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($position_id)
    {
        $this->findModel($position_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Positions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $position_id ID del cargo o posición
     * @return Positions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($position_id)
    {
        if (($model = Positions::findOne(['position_id' => $position_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
