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
     <?= $form->field($model, 'check')->checkbox(['label'=>""])->label("Вывести только выполняемые в данный момент") ?>
    <?= $form->field($model, 'start_date')->textInput(['type' => 'date'])->label('Начало интервала') ?>
    <?= $form->field($model, 'end_date')->textInput(['type' => 'date'])->label('Конец интервала') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<table class="table table-bordered">
<tr><td><b>Проекты(Договоры)</b></td><td><b>Дата подписания</b></td><td><b>Срок окончания договора</b></td></tr>
    <?
    foreach ($_data as $data){ 
    echo '<tr><td>'.$data->name.'</td> ';
    echo '<td>'.$data->start_date.'</td> ';
    echo '<td>'.$data->end_date.'</td></tr> ';
 }
?>
</table>