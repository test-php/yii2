<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

    <h1>Department</h1>
    <a href="<?=Url::to(['/department/add']); ?>">Добавить</a>
    <ul>
        <?php foreach ($department as $d): ?>

            <li>
                <?= Html::encode("{$d->id} ({$d->name})") ?>
                <a href="<?= Url::to(['/department/update', 'id'=> $d->id]); ?>">редактировать</a>
                <a href="<?= Url::to(['/department/delete', 'id'=> $d->id]); ?>">удалить</a>

            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' =>$pagination]) ?>