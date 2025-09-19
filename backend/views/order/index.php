<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Заказы";
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                'id',
                [
                        'attribute' => 'user_id',
                        'value' => fn($model) => $model->user->username ?? "—",
                        'label' => 'Клиент',
                ],
                [
                        'attribute' => 'service_id',
                        'value' => fn($model) => $model->service->title ?? "—",
                        'label' => 'Услуга',
                ],
                'note:ntext',
                [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::dropDownList(
                                    'status',
                                    $model->status,
                                    [
                                            \common\models\Order::STATUS_NEW => 'Новый',
                                            \common\models\Order::STATUS_IN_PROGRESS => 'В процессе',
                                            \common\models\Order::STATUS_COMPLETED => 'Завершен',
                                    ],
                                    [
                                            'class' => 'form-control status-dropdown',
                                            'data-id' => $model->id,
                                            'onchange' => '
                            let id = $(this).data("id");
                            let status = $(this).val();
                            window.location.href = "'.Url::to(['order/change-status']).'?id=" + id + "&status=" + status;
                        '
                                    ]
                            );
                        },
                ],
                'created_at',
                'updated_at',
        ],
]); ?>
