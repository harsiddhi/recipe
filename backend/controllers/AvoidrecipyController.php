<?php

namespace backend\controllers;
use Yii;
use yii\web\UploadedFile;
use backend\models\Item;
use backend\models\ItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * ItemController implements the CRUD actions for Item model.
 */
class AvoidrecipyController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['create', 'update','view','index','delete'],
            'rules' => [
                // deny all POST requests
                [
                    'allow' =>true,
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
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        /* $countList =Item::find()
                ->where(['categoty_id' =>2])
                ->count();


   $dataObject =Item::find()
                ->where(['categoty_id' =>2])
                ->all();


            
 
    /* if($countList>0){
            foreach($dataObject as $post){
                //var_dump($posts);
               // var_dump($post->item_name);
                print_r($post->item_name);
            }
            
        }
        else{
            echo "something wrong";
        }*/
 
    

        $searchModel = new ItemSearch();
       // $dataObject=new Item();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);
      //  var_dump($dataObject->item_name);


      return $this->render('index', [
          'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
           
           
          // 'dataObject'=>$dataObject,

       ]);
    }

    /**
     * Displays a single Item model.
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post())) {

            $model->file=UploadedFile::getInstance($model,'file');
               
            $imageName=time().$model->item_name.$model->file;


            $model->file->saveAs('uploads/'.$imageName);
            $model->item_photo='uploads/'.$imageName;

            //var_dump($model->file);
            $model->save();
                return $this->redirect(['view', 'id' => $model->item_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
         return $this->redirect(['../index.php/avoidrecipy']);

       // return $this->redirect(['index']);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
