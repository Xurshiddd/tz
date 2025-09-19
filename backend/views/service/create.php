<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Добавление услуга</h3>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'product-form',
                        'options' => ['class' => 'form-horizontal'],
                    ]); ?>

                    <!-- Title maydoni -->
                    <?= $form->field($model, 'title', [
                        'template' => '
                            <div class="mb-3">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'labelOptions' => ['class' => 'form-label'],
                        'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Введите название услуга'],
                    ])->textInput()->label('Название услуга') ?>

                    <!-- Description maydoni -->
                    <?= $form->field($model, 'description', [
                        'template' => '
                            <div class="mb-3">
                                {label}
                                {input}
                                {error}
                            </div>
                        ',
                        'labelOptions' => ['class' => 'form-label'],
                        'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Краткое описание услуга', 'rows' => 3],
                    ])->textarea()->label('Описание') ?>

                    <!-- Price maydoni -->
                    <?= $form->field($model, 'price', [
                        'template' => '
                            <div class="mb-3">
                                {label}
                                <div class="input-group">
                                    {input}
                                    <span class="input-group-text">сум</span>
                                </div>
                                {error}
                            </div>
                        ',
                        'labelOptions' => ['class' => 'form-label'],
                        'inputOptions' => ['class' => 'form-control', 'placeholder' => '0', 'min' => '0', 'step' => '0.01'],
                    ])->textInput()->label('Цена') ?>

                    <!-- Submit tugmasi -->
                    <div class="form-group">
                        <?= Html::submitButton('Добавить услуга', ['class' => 'btn btn-primary w-100 mt-4']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Roboto', sans-serif;
    }
    .card {
        border: none;
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
    }
    .form-control, .input-group-text {
        border-radius: 8px;
    }
    .btn-primary {
        background-color: #0d6efd;
        border: none;
        border-radius: 8px;
        padding: 10px 0;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
    }
    .input-group-text {
        background-color: #e9ecef;
    }
</style>
<script>
    document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Forma ma'lumotlarini olish
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const price = document.getElementById('price').value;

        this.reset();

        // Foydalanuvchiga xabar berish
        alert('Товар успешно добавлен!');
    });
</script>