<div><a href="/service/create" class="my-3 btn btn-primary">создавать услуга</a></div>

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
                <a href="/service/update?id=<?= $item->id ?>" class="btn btn-sm btn-warning">Редактировать</a>
                <a href="/service/delete?id=<?= $item->id ?>" class="btn btn-sm btn-danger"
                   data-confirm="Удалить?" data-method="post">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
use yii\bootstrap5\LinkPager;

echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'options' => ['class' => 'pagination justify-content-center'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
]);
?>
