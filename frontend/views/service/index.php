<?php
use yii\bootstrap5\Html;
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">описание</th>
        <th scope="col">цена</th>
        <th scope="col">действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dataProvider->getModels() as $item): ?>
        <tr>
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->title ?></td>
            <td><?= $item->description ?></td>
            <td><?= $item->price ?></td>
            <td>
                <?= Html::a('на заказ', ['/order/create', 'service_id' => $item->id], ['class' => 'btn btn-success']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
use yii\bootstrap5\LinkPager;

echo LinkPager::widget([
    'pagination' => $dataProvider->pagination,
    'options' => ['class' => 'pagination justify-content-center'], // umumiy ul class
    'linkContainerOptions' => ['class' => 'page-item'],            // li class
    'linkOptions' => ['class' => 'page-link'],                     // a class
    'disabledListItemSubTagOptions' => ['class' => 'page-link'],   // disabled uchun
]);
?>
