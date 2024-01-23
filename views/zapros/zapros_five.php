<?php
use app\models\Departments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>


<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'parameter')->dropDownList([
        true=>'Проекты',
        false=>'Контракты'
    ])->label("Что ищем?")?>
    <?= $form->field($model, 'start_date')->textInput(['type' => 'date'])->label('Начало интервала') ?>
    <?= $form->field($model, 'end_date')->textInput(['type' => 'date'])->label('Конец интервала') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>


    <?
    echo  'cумма c '.$model->start_date.' по '.$model->end_date.' =  <b>'.$_data[0]['money'].'</b> Руб.';
    // foreach ($_data as $data){ 
    // echo '<tr><td>'.$data->name.'</td> ';
    // echo '<td>'.$data->start_date.'</td> ';
    // echo '<td>'.$data->end_date.'</td></tr> ';
// }