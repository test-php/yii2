<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Position</h1>
<a href="<?= Url::to(['position/add']); ?>">Добавить</a>
<ul>
    <?php foreach ($position as $p): ?>
    <li>
        <?= Html::encode("{$p->id} ({$p->name})") ?>:
        <a href="<?= Url::to(['/position/update', 'id' => $p->id]); ?>">редактировать</a>
        <a href="<?= Url::to(['/position/delete', 'id' => $p->id]); ?>">удалить</a>
    </li>

    <?php endforeach; ?>
</ul>
<?= LinkPager::widget(['pagination' =>$pagination]) ?>

