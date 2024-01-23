<?php
use app\models\Departments;
use app\models\Projects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>


<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'parameter')->dropDownList(ArrayHelper::map(Projects::find()->all(), 'id_project', 'name'))->label('Проекты') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); 
?>

<table class="table table-bordered">
<tr><td><b>Категория</b></td><td><b>Количество</b></td></tr>
<?
    foreach ($kolCat as $cat){ 
         echo '<tr><td>'.$cat['name'].'</td> ';
         echo '<td>'.$cat['kol'].'</td></tr> ';
    }

?>
<tr><td><b>Всего</b></td><td><b><?=$kol ?></b></td></tr>
</table>