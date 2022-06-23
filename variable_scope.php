<?php

$a = 'a';

function local()
{
    global $a;
    echo $a;
}

local();
