<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Мои заказы';
?>

<h1><?= $this->title ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'=>[
        ['class'=>'yii\grid\SerialColumn'],
        ['attribute'=>'service_id','value'=>function($m){return $m->service->title;}],
        'status',
        'note:text',
        'created_at:datetime',
    ],
]) ?>
