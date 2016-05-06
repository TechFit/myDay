<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(yii\jui\DatePicker::className(),
        [
            'dateFormat' => 'yyyy-MM-dd'
        ]
    )
    ?>

    <?= $form->field($model, 'php')->checkbox() ?>

    <?= $form->field($model, 'eng')->checkbox() ?>

    <?= $form->field($model, 'sport')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>date</th>
            <th>result</th>
            <th>delete</th>
        </tr>
        </thead>
        <?php foreach ($a as $item){ ?>
        <tr>
            <td>
                <?php echo $item['id']?>
            </td>
            <td>
                <?php echo $item['date']?>
            </td>
            <td>
                <?php echo $item['result']?>
            </td>
            <td>
                <a href="<?php echo Url::toRoute(['site/del', 'id' => $item['id']]) ?>" >Удалить</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
