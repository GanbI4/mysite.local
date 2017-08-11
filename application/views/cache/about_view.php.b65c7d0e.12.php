<?php 
/** Fenom template 'about_view.php' compiled at 2017-08-11 07:26:01 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><h2>Мои Контакты:</h2>
<p>
<table>
<?php
/* about_view.php:4: {if $params1!} */
 if(isset($var["params1"])) { ?><h4>Это параметр из полученной строки: <?php
/* about_view.php:4: {$params1} */
 echo $var["params1"]; ?></h4><?php
/* about_view.php:4: {/if} */
 } ?>
<?php
/* about_view.php:5: {if $params2!} */
 if(isset($var["params2"])) { ?><h4>Это параметр из полученной строки: <?php
/* about_view.php:5: {$params2} */
 echo $var["params2"]; ?></h4><?php
/* about_view.php:5: {/if} */
 } ?>
А эти данные взяты из базы данных:
<tr><td>Тип контакта</td><td>Значение</td><td>Описание</td></tr>

	<?php  if(!empty($var["data"]) && (is_array($var["data"]) || $var["data"] instanceof \Traversable)) {
  foreach($var["data"] as $var["row"]) { ?>
	
		<tr>
		    <td><?php
/* about_view.php:12: {$row['type_contacts']} */
 echo $var["row"]['type_contacts']; ?></td>
		    <td><?php
/* about_view.php:13: {$row['value']} */
 echo $var["row"]['value']; ?></td>
		    <td><?php
/* about_view.php:14: {$row['Description']} */
 echo $var["row"]['Description']; ?></td>
		</tr>
	<?php
/* about_view.php:16: {/foreach} */
   } } ?>

</table>
</p>
<?php
}, array(
	'options' => 128,
	'provider' => false,
	'name' => 'about_view.php',
	'base_name' => 'about_view.php',
	'time' => 1502429160,
	'depends' => array (
  0 => 
  array (
    'about_view.php' => 1502429160,
  ),
),
	'macros' => array(),

        ));
