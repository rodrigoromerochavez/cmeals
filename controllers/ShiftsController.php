<?php

namespace app\controllers;

use app\models\Shifts;
use app\models\ShiftsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShiftsController implements the CRUD actions for Shifts model.
 */
class ShiftsController extends Controller
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
     * Lists all Shifts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ShiftsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shifts model.
     * @param int $shift_id ID del turno
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($shift_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($shift_id),
        ]);
    }

    /**
     * Creates a new Shifts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Shifts();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'shift_id' => $model->shift_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Shifts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $shift_id ID del turno
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($shift_id)
    {
        $model = $this->findModel($shift_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'shift_id' => $model->shift_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shifts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $shift_id ID del turno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($shift_id)
    {
        $this->findModel($shift_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shifts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $shift_id ID del turno
     * @return Shifts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($shift_id)
    {
        if (($model = Shifts::findOne(['shift_id' => $shift_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
