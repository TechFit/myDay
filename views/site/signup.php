<h1>Регистрация</h1>
<?php
    use yii\widgets\ActiveForm;
?>

<?php
    $form = ActiveForm::begin(['class' => 'form-horizontal']);
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
