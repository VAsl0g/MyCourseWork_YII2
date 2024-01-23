
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

    <?=$form1->field($model1, 'parameter')->dropDownList(ArrayHelper::map(Projects::find()->all(), 'id_project', 'name' ))->label("Проект");; ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<div >

<table  class="table table-bordered">
<tr><td><b>Связанные договоры</b></td></tr>
<?
foreach ($data1 as $_data1){ 
        echo '<tr><td>'.$_data1['name'].'</td></tr>';
    }
//     ?>
</table>
</div>
</div>



<div>
<?php $form2 = ActiveForm::begin(); ?>
    <?=$form2->field($model2, 'parameter')->dropDownList(ArrayHelper::map(Contracts::find()->all(), 'id_contract', 'name' ))->label("Договор"); ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); 
?>


<div >

<table  class="table table-bordered">
<tr><td><b>Связанные пректы</b></td></tr>
<?
foreach ($data2 as $_data2){ 
        echo '<tr><td>'.$_data2['name'].'</td></tr>';
    }
//     ?>
</table>
</div>
</div>