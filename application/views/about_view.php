<h1>Мои Контакты</h1>
<p>
<table>
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
