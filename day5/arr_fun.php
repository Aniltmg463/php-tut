<?php
$var1 = 5;

function fool(): void
{
    $var1 = 10;
    echo $var1 . ' from inside function<br>';
}

fool();
echo $var1 . ' from outside function';