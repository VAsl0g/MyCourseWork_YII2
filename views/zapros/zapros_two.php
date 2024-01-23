



<table class="table table-bordered">
<tr><td><b>ФИО Деректоров</b></td></tr>
    <?
    foreach ($directors as $director){ 
    echo '<tr><td>'.$director->FIO.'</td> ';
}
?>
</table>