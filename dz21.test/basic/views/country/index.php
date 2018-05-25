<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

    <h1>Countries</h1>
    <ul>
        <?php foreach ($countries as $country): ?>

            <li>
                <?= Html::encode("{$country->code} ({$country->name})") ?>:
                <?= $country->population ?>
                <a href="<?= \yii\helpers\Url::to(['/country/delete','code' => $country->code]) ?>">Удалить</a>
                <a href="<?= \yii\helpers\Url::to(['/country/update', 'code' => $country->code]) ?>">Редактировать</a>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' =>$pagination]) ?>