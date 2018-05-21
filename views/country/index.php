<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<h1>Countries</h1>
<ul>
<?php foreach ($countries as $country): ?>

	<li>
		<?= Html::encode("{$country->code} ({$country->name})") ?>:
		<?= $country->population ?>
		<a href="<?= Url::to(['country/update', $country->code]); ?>">редакт</a>
	</li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' =>$pagination]) ?>

