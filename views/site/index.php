<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\form;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;


$this->title = 'MyDay';
?>
    <div class="site-index">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'date')->label('Дата')->widget(yii\jui\DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd']) ?>

        <?= $form->field($model, 'check')->label('Выполненные задачи')->checkboxList(form::checkFormData()); ?>

        <div class="form-group">
            <?= Html::submitButton('', ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <table class="table" id="result-table">
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
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="<?php echo (int)($item['result'] * 100 / count($allNameEx)); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $item['result'] * 100 / count($allNameEx); ?>%">
                                <?php echo (int)($item['result'] * 100 / count($allNameEx)); ?>%
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
                'title' => ['text' => 'Результаты дня на графике'],
                'xAxis' => [
                    'title' => ['text' => 'День'],
                    'categories' => $getDayResultDate,
                    'type' => 'datetime',
                ],
                'yAxis' => [
                    'title' => ['text' => 'Результат'],
                    'min' => 0,
                    'tickInterval' => 1
                ],
                'series' => [
                    [
                        'name' => 'Результаты',
                        'data' =>  $getDayResultCount,
                        'dataLabels' => ['enabled'=> 'true'],
                        'color' => '#5bc0de'

                    ],
                ]
            ]
        ]); ?>

    </div>