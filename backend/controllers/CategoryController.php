<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AcessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\DateTime;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
               /* 'access' => [
                'class'=>AcessControl::className(),
                'only'=>['create','update'],
                'rules'=>[
                [
                'allow'=>true,
                'roles'=>['@'],

                ],
                ]*/
                'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['create', 'update','view','delete','index'],
            'rules' => [
                // deny all POST requests
                [
                    'allow' => true,
                    'verbs' => ['POST']
                ],
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],



                
                 
        
            'verbs' => [
           
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
         // $model->category_createdat=date('YY-m-dd h:m:s');
          //var_dump( $model->category_createdat);

        if ($model->load(Yii::$app->request->post())) {
          
          // $model->category_updatedat=date('Y-m-d ');
            //$temp=date('H:i:s');

            //  $model->category_createdat=date('Y-m-d h:i:s');
            $model->category_createdat=date('Y-m-d h:i:s');
           // $time1 = new \DateTime('now', new \DateTimeZone('IST'));
             var_dump($model->category_createdat);
            // var_dump($time1);
              $model->category_updatedat=date('0-0-0');
           

            $model->file=UploadedFile::getInstance($model,'file');
               $imageName=time().$model->category_name.$model->file;


            $model->file->saveAs('uploads/'.$imageName);
            $model->category_photo='uploads/'.$imageName;





            $model->save();
           return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $model->category_updatedat=date('Y-m-d h:i:sa');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['../index.php/category']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
