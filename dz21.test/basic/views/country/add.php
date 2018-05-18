<?php

use yii\widgets\ActiveForm;

/**
 * @var \app\models\CountryForm $model
 */

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'code') ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model,'population') ?>

<div class="form-group">
    <?= \yii\helpers\Html::submitButton('Отправить',['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
