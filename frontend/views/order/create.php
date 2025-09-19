<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Заказ: ' . $service->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div>
    <p><strong>Услуга:</strong> <?= Html::encode($service->title) ?></p>
    <p><strong>Цена:</strong> <?= $service->price ?></p>
</div>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'note')->textarea(['rows'=>4]) ?>
<?= Html::submitButton('Заказ', ['class'=>'btn btn-primary mt-3']) ?>
<?php ActiveForm::end(); ?>
