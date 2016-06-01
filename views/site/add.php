<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'Add new fit';
?>
<div class="site-index">

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($addform, 'nameEx')->textInput()->label('Exercise name')?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => \app\models\exercise::find(),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            ],
        ]
    ]);
    ?>
</div>
