<?php

namespace backend\controllers;

use backend\models\Service;
use Yii;
use yii\data\ActiveDataProvider;

class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        if (Yii::$app->user->isGuest && Yii::$app->user->role != 'admin') {
            return $this->goHome();
        }
        $model = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'услуга успешно добавлен!');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'услуга не успешно добавлен!');
                return $this->refresh();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($id)
    {

    }
    public function actionDelete($id)
    {
        $command = Yii::$app->db->createCommand("DELETE FROM service WHERE id = :id");
        $command->bindValue(':id', $id);
        if ($command->execute()) {
            Yii::$app->session->setFlash('success', 'Услуга успешно удалена');
        }
        return $this->redirect(['index']);
    }
}
