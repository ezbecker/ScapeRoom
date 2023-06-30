<?php


function renderImage($src)
{
    echo '<img src="' . $src . '">';
}

function renderButton($class, $onclick)
{
    echo '<button class="' . $class . '" onclick="' . $onclick . '"></button>';
}
