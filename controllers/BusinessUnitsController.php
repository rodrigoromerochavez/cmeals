<?php

namespace app\controllers;

use app\models\BusinessUnits;
use app\models\BusinessUnitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusinessUnitsController implements the CRUD actions for BusinessUnits model.
 */
class BusinessUnitsController extends Controller
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
     * Lists all BusinessUnits models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BusinessUnitsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BusinessUnits model.
     * @param int $business_unit_id ID de la unidad de negocio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($business_unit_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($business_unit_id),
        ]);
    }

    /**
     * Creates a new BusinessUnits model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BusinessUnits();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'business_unit_id' => $model->business_unit_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusinessUnits model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $business_unit_id ID de la unidad de negocio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($business_unit_id)
    {
        $model = $this->findModel($business_unit_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'business_unit_id' => $model->business_unit_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BusinessUnits model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $business_unit_id ID de la unidad de negocio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($business_unit_id)
    {
        $this->findModel($business_unit_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BusinessUnits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $business_unit_id ID de la unidad de negocio
     * @return BusinessUnits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($business_unit_id)
    {
        if (($model = BusinessUnits::findOne(['business_unit_id' => $business_unit_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
