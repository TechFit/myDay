<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\form;
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

    <table class="table">
        <thead>
        <tr>
            <th>Exercise Name</th>
            <th>Edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <?php foreach ($allNameEx as $item){ ?>
            <tr>
                <td>
                    <?php echo $item['name']?>
                </td>
                <td>
                edit
                </td>
                <td>
                    <a href="<?php echo Url::toRoute(['site/ExDel', 'name' => $item['name']]) ?>" >Удалить</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>
