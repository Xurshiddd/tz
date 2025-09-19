<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= Html::encode($message) ?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'email')->textInput() ?>
<?php //= $form->field($model, 'password')->passwordInput() ?>

<?php //= $form->field($model, 'rememberMe')->checkbox() ?>
<div class="form-group mt-5">
    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
