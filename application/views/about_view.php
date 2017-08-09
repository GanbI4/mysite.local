<h1>Мои Контакты</h1>
<p>
<table>
<?php if (isset($params1) && $params1 !== '') echo "<h3>А это параметр из строки: $params1</h3>"; ?>
<?php if (isset($params2) && $params2 !== '') echo "<h3>А это второй параметр из строки: $params2</h3>"; ?>
Эти данные взяты из базы данных:
<tr><td>Тип контакта</td><td>Значение</td><td>Описание</td></tr>
<?php
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['type_contacts'].'</td><td>'.$row['value'].'</td><td>'.$row['Description'].'</td></tr>';
	}
?>
</table>
</p>
