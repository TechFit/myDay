<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Add new fit';
?>
<div class="site-index">

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($addform, 'nameEx')->textInput()->label('Exercise name')?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

    <?php foreach ($allNameEx as $item){ ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($updateForm, 'updateEx')->textInput(array('value'=>$item['name']))->label('');?>

        <?= $form->field($updateForm, 'idEx',['options' => ['class' => 'hidden']])->hiddenInput(array('value'=>$item['id']))->label('');?>

        <div class="form-group">

        <a href="<?php echo Url::toRoute(['site/ex-delete', 'id' => $item['id']]) ?>" >Удалить</a>

        </div>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    <?php } ?>

</div>