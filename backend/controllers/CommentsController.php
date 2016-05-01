<?php

namespace backend\controllers;

use Yii;
use common\models\Comments;
use backend\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($event) {
    	$this->view->params['breadcrumbs'][] = ['label' => 'Administration', 'url' => ['/site/administration']];
    	
    	return parent::beforeAction($event);
    }

    /**
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param integer $id
     * @param integer $ballot_id
     * @param integer $ballot_option_id
     * @return mixed
     */
    public function actionView($id, $ballot_id, $ballot_option_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $ballot_id, $ballot_option_id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'ballot_id' => $model->ballot_id, 'ballot_option_id' => $model->ballot_option_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $ballot_id
     * @param integer $ballot_option_id
     * @return mixed
     */
    public function actionUpdate($id, $ballot_id, $ballot_option_id)
    {
        $model = $this->findModel($id, $ballot_id, $ballot_option_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'ballot_id' => $model->ballot_id, 'ballot_option_id' => $model->ballot_option_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $ballot_id
     * @param integer $ballot_option_id
     * @return mixed
     */
    public function actionDelete($id, $ballot_id, $ballot_option_id)
    {
        $this->findModel($id, $ballot_id, $ballot_option_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $ballot_id
     * @param integer $ballot_option_id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $ballot_id, $ballot_option_id)
    {
        if (($model = Comments::findOne(['id' => $id, 'ballot_id' => $ballot_id, 'ballot_option_id' => $ballot_option_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
