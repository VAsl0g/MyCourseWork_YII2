<?php
use app\models;
use app\models\Categories;
use app\models\Contracts;
use app\models\Employees;
use app\models\Projects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div>

<?php $form1 = ActiveForm::begin(); ?>
  <?=$form1->field($modelf, 'parameter')->dropDownList(ArrayHelper::map(Employees::find()->all(), 'id_employee', 'FIO' ))->label("Сотрудник"); ?>
 
    <?= $form1->field($modelf, 'start_date')->textInput(['type' => 'date'])->label('Начало интервала') ?>
    <?= $form1->field($modelf, 'end_date')->textInput(['type' => 'date'])->label('Конец интервала') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>
<div >

<table  class="table table-bordered">
<tr><td><b>Проект</b></td><td><b>Договор</b></td></tr>
<?
foreach ($data1 as $equipment){ 
    echo '<tr>';
    echo'<td>'.$equipment['pname'].'</td> ';
    echo'<td>'.$equipment['cname'].'</td> </tr>';
}
//     ?>
</table>
</div>
</div>



<div>
<?php $form2 = ActiveForm::begin(); ?>
    <?=$form2->field($modelt, 'parameter')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id_category', 'name' ))->label("Категория"); ?>
    <?= $form2->field($modelt, 'start_date')->textInput(['type' => 'date'])->label('Начало интервала') ?>
    <?= $form2->field($modelt, 'end_date')->textInput(['type' => 'date'])->label('Конец интервала') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); 
?>


<div >

<table  class="table table-bordered">
<tr><td><b>Сотрудник</b></td><td><b>Проект</b></td><td><b>Договор</b></td></tr>
<?
foreach ($data2 as $equipment){ 
    echo '<tr><td>'.$equipment['ename'].'</td> ';
    echo'<td>'.$equipment['pname'].'</td> ';
    echo'<td>'.$equipment['cname'].'</td> </tr>';
}
//     ?>
</table>
</div>
</div>