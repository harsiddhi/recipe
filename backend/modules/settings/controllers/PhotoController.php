<?php

namespace backend\modules\settings\controllers;

use Yii;
use backend\modules\settings\models\Photo;
use backend\modules\settings\models\PhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
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
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photo();

       // print_r($_FILES);
        
       
 if ($model->load(Yii::$app->request->post())) {
          
    $files = UploadedFile::getInstances($model, 'file');
foreach ($files as $file) {
         $imageName=time().$file;
        $file->saveAs('C:/xampp/htdocs/new/images/'.$imageName);
         $model->p_photo='uploads/'.$imageName;
           $model->save();
           

    }

   // $count=count($model->p_photo);
   // print_r($count);
    
   /* for($i=0;$i<$count;$i++) {

        $imageName=time().$file[0][$i];
        $img[]=$imageName;
//print_r($imageName);
    $file[0][$i]->saveAs('C:/xampp/htdocs/new/images/'.$imageName);
     $model->p_photo='uploads/'.$imageName;

    // print_r($model->p_photo);*/
            



       // $model->save();


        # code...
    

 //return $this->redirect(['view', 'id' => $model->id]);
     return $this->redirect(['index','id'=>$model->id]);


      } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Photo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
