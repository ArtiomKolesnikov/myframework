<?php
function d($arr)
{
    echo '<pre>'. print_r($arr,true) . '</pre>';
}

function dd($arr)
{
    die('<pre>'. print_r($arr,true) . '</pre>');
}