<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

$this->title = 'Brain';
?>

    <div class="pressure">
        <?php echo "Атм.д = " . $pressure; ?>
    </div>

<?php $form= ActiveForm::begin([
    'options' =>['class' => 'col-md-3']
]); ?>

        <?= $form->field($pressureForm, 'date')->label('Дата')->widget(yii\jui\DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd']) ?>

        <?= $form->field($pressureForm, 'pressure')->label('Атм.д')->textInput(array('value'=>$pressure)); ?>

        <?= $form->field($pressureForm, 'brain')->radioList(['1' => "Да", '0' => 'Нет'])->label('Состояние'); ?>


    <div class="form-group">
        <?= Html::submitButton('', ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
    </div>

<?php ActiveForm::end(); ?>


<?= Highcharts::widget([
    'options' => [
        'chart' => [
            'zoomType' => 'xy'
        ],
        'title' => ['text' => 'Результаты состояния'],
        'xAxis' => [
            'title' => ['text' => 'День'],
            'categories' => $showPressureDate,
            'type' => 'datetime',
            'crosshair' => true
        ],
        'yAxis' => [
            [
            'title' => ['text' => 'Результат'],
            'labels' => ['format' => '{value}'],
            ],

            [
                'title' => ['text' => 'Давление'],
                'labels' => ['format' => '{value}'],
                'opposite' => true
            ],
        ],
        'legend' => [
            'layout' => 'vertical',
            'x' => 120,
            'verticalAlign' => 'top',
            'y' => '10',
            'floating' => 'true'
        ],
        'series' => [
            [
                'name' => 'Результаты',
                'data' =>  $showPressureResult,
                'dataLabels' => ['enabled'=> 'true'],
                'color' => '#5bc0de',
                'type' => 'column'

            ],

            [
                'name' => 'Давление',
                'data' =>  $showPressureValue,
                'dataLabels' => ['enabled'=> 'true'],
                'color' => '#FF3333',
                'type' => 'spline',
                'yAxis' => 1
            ],
        ]
    ]
]); ?>

