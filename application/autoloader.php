<?php
    $s = PATH_SEPARATOR.'application/core';
    $s .= PATH_SEPARATOR.'application/classes';
    $s .= PATH_SEPARATOR.'application/controllers';
    $s .= PATH_SEPARATOR.'application/models';
    
    set_include_path(get_include_path().$s);
    spl_autoload_extensions('.php');
    spl_autoload_register();
?>