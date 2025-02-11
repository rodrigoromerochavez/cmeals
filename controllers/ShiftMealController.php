<?php

namespace app\controllers;

use app\models\ShiftMeal;
use app\models\ShiftMealSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShiftMealController implements the CRUD actions for ShiftMeal model.
 */
class ShiftMealController extends Controller
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
     * Lists all ShiftMeal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ShiftMealSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShiftMeal model.
     * @param int $shift_meal_id ID de la relación entre turno y comida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($shift_meal_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($shift_meal_id),
        ]);
    }

    /**
     * Creates a new ShiftMeal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ShiftMeal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'shift_meal_id' => $model->shift_meal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ShiftMeal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $shift_meal_id ID de la relación entre turno y comida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($shift_meal_id)
    {
        $model = $this->findModel($shift_meal_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'shift_meal_id' => $model->shift_meal_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShiftMeal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $shift_meal_id ID de la relación entre turno y comida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($shift_meal_id)
    {
        $this->findModel($shift_meal_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShiftMeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $shift_meal_id ID de la relación entre turno y comida
     * @return ShiftMeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($shift_meal_id)
    {
        if (($model = ShiftMeal::findOne(['shift_meal_id' => $shift_meal_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
