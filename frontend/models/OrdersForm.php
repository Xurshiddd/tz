<?php

namespace frontend\models;

use backend\models\Service;
use yii\base\Model;

class OrdersForm extends Model
{
    public $service_id;
    public $user_id;
    public $note;
    public $status;
    public function rules()
    {
        return [
            [['service_id', 'note'], 'required'],
            [['service_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Service::class,
                'targetAttribute' => ['service_id' => 'id'],
                'when' => function($model) {
                    return $model->service_id > 0;
                }
            ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'note' => 'Примечание'
        ];
    }
}