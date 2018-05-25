<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<h1>Persons</h1>
<a href="<?= Url::to(['/person/add']); ?>">добавить</a>
<ul>
<?php foreach ($persons as $person): ?>

	<li>
		<?= Html::encode("{$person->name} ({$person->surname})") ?>:
		<?= $person->department ?>
		<a href="<?= Url::to(['/person/update', 'id' => $person->id]); ?>">редактировать</a>
		<a href="<?= Url::to(['/person/delete', 'id' => $person->id]); ?>">удалить</a>
	</li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' =>$pagination]) ?>

