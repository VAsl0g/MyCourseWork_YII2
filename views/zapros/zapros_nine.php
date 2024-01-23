


<table class="table table-bordered">
<tr><td><b>Субподрядчик</b></td><td><b>Проекты</b></td><td><b>Цена</b></td></tr>
    <?
    foreach ($data as $_data){ 
    echo '<tr><td>'.$_data->subcontractor.'</td> ';
    echo '<td>'.$_data->projects->name.'</td>';
    echo '<td>'.$_data->price.'</td> </tr>';
}
?>
</table>