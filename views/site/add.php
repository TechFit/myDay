<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Добавить испытание';
?>
<div class="site-index">

<?php $form = ActiveForm::begin([
    'options' =>['class' => 'col-md-12']
    ]); ?>

    <?= $form->field($addform, 'nameEx', ['options' => ['class' => 'col-md-5']])->textInput()->label('Название испытания')?>

    <div class="form-group">
        <?= Html::submitButton('', ['class' => 'btn btn-success glyphicon glyphicon-plus exercise-add']) ?>
    </div>

<?php ActiveForm::end(); ?>

    <?php foreach ($allNameEx as $item){ ?>

        <?php $form = ActiveForm::begin([
            'options' =>['class' => 'col-md-12']
        ]); ?>
            <?= $form->field($updateForm, 'updateEx', ['options' => ['class' => 'col-md-3']])->textInput(array('value'=>$item['name']))->label('');?>
        
            <?= $form->field($updateForm, 'idEx',['options' => ['class' => 'hidden']])->hiddenInput(array('value'=>$item['id']))->label('');?>

            <div class="form-group exercise-submit-buttons">
                <?= Html::submitButton('', ['class' => 'btn btn-primary glyphicon glyphicon-refresh update-button']) ?>
                <a href="<?php echo Url::toRoute(['site/ex-delete', 'id' => $item['id']]) ?>" class="btn btn-danger glyphicon glyphicon-trash delete-button"></a>
            </div>
        <?php ActiveForm::end(); ?>

    <?php } ?>

</div>