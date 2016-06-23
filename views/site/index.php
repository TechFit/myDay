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

        <?= $form->field($model, 'date')->widget(yii\jui\DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd']) ?>

        <?= $form->field($model, 'check')->checkboxList(form::checkFormData()); ?>

        <div class="form-group">
            <?= Html::submitButton('', ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <table class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Результат</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <?php foreach ($getDayResult as $item) { ?>
                <tr>
                    <td>
                        <?php echo $item['date'] ?>
                    </td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $item['result'] * 100 / count($allNameEx); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $item['result'] * 100 / count($allNameEx); ?>%">
                                <?php echo $item['result'] * 100 / count($allNameEx); ?>%
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="<?php echo Url::toRoute(['site/del', 'id' => $item['id']]) ?>"
                           class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?= Highcharts::widget([
            'options' => [
                'title' => ['text' => 'Customer orders day (last 30 days)'],
                'chart' => ['type' => 'column'],
                'xAxis' => [
                    'title' => ['text' => 'Day'],
                    'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'type' => 'datetime',
                ],
                'yAxis' => [
                    'title' => ['text' => 'Money'],
                    'min' => 0,
                    'tickInterval' => 1
                ],
                'series' => [
                    [
                        'name' => 'Orders',
                        'data' => [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                        'dataLabels' => ['enabled'=> 'true']
                    ],
                ]
            ]
        ]); ?>

    </div>
