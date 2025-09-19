<?php
namespace backend\controllers;

use Yii;
use common\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                        'matchCallback'=>function($rule,$action){
                            return Yii::$app->user->identity->role === 'admin';
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->with('user','service')->orderBy(['created_at'=>SORT_DESC]),
            'pagination'=>['pageSize'=>20],
        ]);
        return $this->render('index', compact('dataProvider'));
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionChangeStatus($id, $status)
    {
        $model = \common\models\Order::findOne($id);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException("Order not found");
        }

        $allowed = [\common\models\Order::STATUS_NEW, \common\models\Order::STATUS_IN_PROGRESS, \common\models\Order::STATUS_COMPLETED];
        if (!in_array($status, $allowed)) {
            throw new \yii\web\BadRequestHttpException("Invalid status");
        }

        $model->status = $status;
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save(false);

        \Yii::$app->session->setFlash('success', 'Status updated!');
        return $this->redirect(['index']);
    }
}
