<?php

if( ! function_exists('createExcerptAndLink')){

    function createExcerptAndLink($text, $limit, $url, $readMoreText = 'Read More') {

        $end = "<br><br><a href=".url()->current()."/".$url.">".$readMoreText."</a>";
        return str_limit($text, $limit, $end);
    }

}                 
