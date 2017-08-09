<?php

namespace application\core;

class View
{
	public function generate($content_view, $template_view, $params = '', $params2 = '', $data = null)
	{
		include 'application/views/'.$template_view;
	}
}
?>