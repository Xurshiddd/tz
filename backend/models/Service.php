<?php
namespace backend\models;
use yii\db\ActiveRecord;
class Service extends ActiveRecord
{
    public static function tableName()
    {
        return 'service'; // DB jadval nomi
    }

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИДЕНТИФИКАТОР',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

//    public function getOrders()
//    {
//        return $this->hasMany(Order::class, ['service_id' => 'id']);
//    }
}
