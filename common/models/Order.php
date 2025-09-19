<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Order extends ActiveRecord
{
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';

    public static function tableName()
    {
        return '{{%order}}';
    }

    public function rules()
    {
        return [
            [['user_id','service_id'], 'required'],
            [['user_id','service_id'], 'integer'],
            [['note'], 'string'],
            ['status','in','range'=>[self::STATUS_NEW,self::STATUS_IN_PROGRESS,self::STATUS_COMPLETED]],
            ['status','default','value'=>self::STATUS_NEW],
        ];
    }

    public function behaviors()
    {
        return [
        [
            'class' => \yii\behaviors\TimestampBehavior::class,
            'value' => date('Y-m-d H:i:s'),
        ],
    ];
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    public function getUser()
    {
        return $this->hasOne(\common\models\User::class, ['id' => 'user_id']);
    }
}
