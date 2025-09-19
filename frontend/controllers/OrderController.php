<?php
namespace frontend\controllers;

use backend\models\Service;
use Yii;
use common\models\Order;
use yii\web\Controller;
use yii\filters\AccessControl;

class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['create','index'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'actions'=>['create','index'],
                        'roles'=>['@'],
                    ],
                ]
            ]
        ];
    }

    public function actionCreate($service_id)
    {
        $service = Service::findOne($service_id);
        if (!$service) throw new \yii\web\NotFoundHttpException('Service not found');

        $model = new Order();
        $model->service_id = $service_id;
        $model->user_id = Yii::$app->user->id;
        $model->status = Order::STATUS_NEW;
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Order created.');
            return $this->redirect(['order/index']);
        }

        return $this->render('create', ['model'=>$model,'service'=>$service]);
    }

    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Order::find()->where(['user_id'=>Yii::$app->user->id])->with('service')->orderBy(['created_at'=>SORT_DESC]),
            'pagination'=>['pageSize'=>10]
        ]);
        return $this->render('index', compact('dataProvider'));
    }
}
