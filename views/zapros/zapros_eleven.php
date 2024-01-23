


<table class="table table-bordered">
<tr><td><b>Оборудование</b></td><td><b>Количество проектов</b></td></tr>
    <?
    foreach ($data as $_data){ 
    echo '<tr><td>'.$_data['name'].'</td> ';
    echo '<td>'.$_data['kol'].'</td></tr> ';

}
?>
</table>