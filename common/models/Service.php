<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%service}}';
    }

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [TimestampBehavior::class];
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class, ['service_id' => 'id']);
    }
}
