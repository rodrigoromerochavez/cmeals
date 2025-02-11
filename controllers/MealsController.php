<?php

namespace app\controllers;

use app\models\Meals;
use app\models\MealsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MealsController implements the CRUD actions for Meals model.
 */
class MealsController extends Controller
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
     * Lists all Meals models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MealsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meals model.
     * @param int $meal_id ID de la comida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($meal_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($meal_id),
        ]);
    }

    /**
     * Creates a new Meals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Meals();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'meal_id' => $model->meal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Meals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $meal_id ID de la comida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($meal_id)
    {
        $model = $this->findModel($meal_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'meal_id' => $model->meal_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Meals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $meal_id ID de la comida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($meal_id)
    {
        $this->findModel($meal_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Meals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $meal_id ID de la comida
     * @return Meals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($meal_id)
    {
        if (($model = Meals::findOne(['meal_id' => $meal_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
