<?php

class View
{
	function generate($content_view, $template_view, $params = '', $data = null)
	{
		include 'application/views/'.$template_view;
	}
}
?>