<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = 'Add new fit';
?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($addform, 'nameEx')->textInput()->label('Exercise name')?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>