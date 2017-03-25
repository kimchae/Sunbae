<?php

function set_active($path, $active = ' class="active"') {

    return call_user_func_array('Request::is', (array)$path) ? $active : '';

}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }

    return $text;
}

?>
