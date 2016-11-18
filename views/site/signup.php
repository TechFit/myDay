<h1>Регистрация</h1>
<?php
    use yii\widgets\ActiveForm;
?>

<?php
    $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);
?>

<?= $form->field($model, 'email')->textInput(['autofocus'=>true])->label("Email"); ?>

<?= $form->field($model, 'password')->passwordInput()->label("Пароль"); ?>

<?= $form->field($model, 'passwordRepeat')->passwordInput()->label("Повторите пароль"); ?>

<div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</div>

<?php
    ActiveForm::end();
?>
