<?php

function dd($var)
{
    var_dump($var);
}

function ddd($var)
{
    dd($var);
    die;
}