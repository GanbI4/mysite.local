<h2>Мои Контакты:</h2>
<p>
<table>
<?php if (isset($params1) && $params1 !== '') echo "<h4>Это параметр из полученной строки: $params1</h4>"; ?>
<?php if (isset($params2) && $params2 !== '') echo "<h4>А это второй параметр из строки: $params2</h4>"; ?>
А эти данные взяты из базы данных:
<tr><td>Тип контакта</td><td>Значение</td><td>Описание</td></tr>
<?php
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['type_contacts'].'</td><td>'.$row['value'].'</td><td>'.$row['Description'].'</td></tr>';
	}
?>
</table>
</p>
