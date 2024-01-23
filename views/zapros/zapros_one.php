<?php
use app\models\Departments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>


<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'parameter')->dropDownList(ArrayHelper::map(Departments::find()->all(), 'id_department', 'name'))->label('Отдел') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>


<table class="table table-bordered">
<tr><td><b>ФИО</b></td><td><b>Отдел</b></td></tr>
<?
    foreach ($employees as $employee){ 
        echo '<tr><td>'.$employee->FIO.'</td> ';
        echo '<td>'.$employee->departments->name.'</td></tr> ';
    }
?>

</table>