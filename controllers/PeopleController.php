<?php

namespace app\controllers;

use app\models\People;
use app\models\PeopleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeopleController implements the CRUD actions for People model.
 */
class PeopleController extends Controller
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
     * Lists all People models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single People model.
     * @param int $person_id ID de la persona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($person_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($person_id),
        ]);
    }

    /**
     * Creates a new People model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new People();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'person_id' => $model->person_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing People model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $person_id ID de la persona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($person_id)
    {
        $model = $this->findModel($person_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'person_id' => $model->person_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing People model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $person_id ID de la persona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($person_id)
    {
        $this->findModel($person_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the People model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $person_id ID de la persona
     * @return People the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($person_id)
    {
        if (($model = People::findOne(['person_id' => $person_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
