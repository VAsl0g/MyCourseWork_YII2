<?php
use app\models\Departments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>


<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'parameter')->dropDownList([
        true=>'цена/месяцы работы',
        false=>'цена/количество сотрудников'
    ])->label("Что ищем?")?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<table class="table table-bordered">
<tr><td><b>Договор</b></td><td><b>Соотношение</b></td></tr>
    <?
    foreach ($data as $_data){ 
    echo '<tr><td>'.$_data['name'].'</td> ';
    echo '<td>'.$_data['ratio'].'</td></tr> ';
  }
?>
</table>