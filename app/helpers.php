<?php

function set_active($path, $active = ' class="active"') {

    return call_user_func_array('Request::is', (array)$path) ? $active : '';

}

?>
