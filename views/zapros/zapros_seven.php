<?php
use app\models;
use app\models\Contracts;
use app\models\Projects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div>
<?php $form1 = ActiveForm::begin(); ?>

    <?=$form1->field($modelf, 'parameter')->dropDownList(ArrayHelper::map(Projects::find()->all(), 'id_project', 'name' ))->label("Проект"); ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<div >

<table  class="table table-bordered">
<tr><td><b>Оборудование</b></td></tr>
<?
foreach ($data1 as $equipment){ 
    echo '<tr><td>'.$equipment['ename'].'</td> ';
}
//     ?>
</table>
</div>
</div>



<div>
<?php $form2 = ActiveForm::begin(); ?>
    <?=$form2->field($modelt, 'parameter')->dropDownList(ArrayHelper::map(Contracts::find()->all(), 'id_contract', 'name' ))->label("Договор"); ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); 
?>


<div >

<table  class="table table-bordered">
<tr><td><b>Оборудование</b></td></tr>
<?
foreach ($data2 as $equipment){ 
    echo '<tr><td>'.$equipment['ename'].'</td> ';
}
//     ?>
</table>
</div>
</div>