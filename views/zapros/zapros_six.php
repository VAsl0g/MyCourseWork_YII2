<?php
use app\models\Departments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>


<?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'check')->checkbox(['label'=>""])->label("Вывести только задействованные в данный момент") ?>
    <?= $form->field($model, 'start_date')->textInput(['type' => 'date'])->label('Дата') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<table class="table table-bordered">
<tr><td><b>Название оборудования</b></td></tr>

    <?
   
    foreach ($_data as $data){ 
    echo '<tr><td>'.$data['name'].'</td>';
 }
?>
</table>