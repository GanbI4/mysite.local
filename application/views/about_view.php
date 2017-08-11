<h2>Мои Контакты:</h2>
<p>
<table>
{if $params1!}<h4>Это первый параметр: {$params1}</h4>{/if}
{if $params2!}<h4>Это второй параметр: {$params2}</h4>{/if}
А эти данные взяты из базы данных:
<tr><td>Тип контакта</td><td>Значение</td><td>Описание</td></tr>

	{foreach $data as $row}
	
		<tr>
		    <td>{$row['type_contacts']}</td>
		    <td>{$row['value']}</td>
		    <td>{$row['Description']}</td>
		</tr>
	{/foreach}

</table>
</p>
