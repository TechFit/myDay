<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\form;
use yii\helpers\Url;

$this->title = 'MyDay';
?>
<div class="site-index">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(yii\jui\DatePicker::className(),['dateFormat' => 'yyyy-MM-dd'])?>

    <?= $form->field($model, 'check')->checkboxList(form::checkFormData()); ?>

    <div class="form-group">
        <?= Html::submitButton('', ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <table class="table">
        <thead>
        <tr>
            <th>date</th>
            <th>result</th>
            <th>delete</th>
        </tr>
        </thead>
        <?php foreach ($getDayResult as $item){ ?>
        <tr>
            <td>
                <?php echo $item['date']?>
            </td>
            <td>
                <?php echo $item['result']?>
            </td>
            <td>
                <a href="<?php echo Url::toRoute(['site/del', 'id' => $item['id']]) ?>" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
